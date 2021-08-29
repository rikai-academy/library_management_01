<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $datetime_borrow =  BorrowedBook::distinct()->orderBy('datetime_borrow', 'ASC')->pluck('datetime_borrow')->toArray();
        
        foreach($datetime_borrow as $time){
            $count_quantity[] = BorrowedBook::where([['datetime_borrow','=', $time],['status', '=' ,Status::BookReturn]])->sum('quantity');
            $sum_price[] = BorrowedBook::where([['datetime_borrow','=', $time],['status', '=' ,Status::BookReturn]])->sum('sub_total');
        }
        return view('Admin.Statistical.chart')
                ->with('datetime_borrow',json_encode($datetime_borrow,JSON_NUMERIC_CHECK))
                ->with('count_quantity',json_encode($count_quantity,JSON_NUMERIC_CHECK))
                ->with('sum_price',json_encode($sum_price,JSON_NUMERIC_CHECK));
    }
}
