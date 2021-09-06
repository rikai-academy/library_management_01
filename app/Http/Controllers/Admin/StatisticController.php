<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $count_approve = BorrowedBook::where('status', Status::Approved)->count('id');
        $count_waiting_return = BorrowedBook::where('status', Status::WaitingBook)->count('id');
        $count_book = Book::count('id');

        if ($request->has(['day', 'today'])) {
            $datetime_return = BorrowedBook::LoadDayToDay($request->day, $request->today);
        } else {
            $datetime_return =  BorrowedBook::distinct()->orderBy('datetime_return', 'ASC')->pluck('datetime_return')->toArray();
        }

        if (count($datetime_return) > 0) {
            foreach ($datetime_return as $time) {
                $count_quantity_book_return[] = BorrowedBook::CountQuantityBookReturn($time);
                $sum_price_book_return[] = BorrowedBook::SumPriceBookReturn($time);

                $count_quantity_book_borrow[] = BorrowedBook::CountQuantityBookBorrow($time);
                $sum_price_book_borrow[] = BorrowedBook::SumPriceBookBorrow($time);
            }
            return view('Admin.Statistical.chart', compact('count_approve', 'count_waiting_return', 'count_book'))
                ->with('datetime_return', json_encode($datetime_return, JSON_NUMERIC_CHECK))
                ->with('count_quantity_book_return', json_encode($count_quantity_book_return, JSON_NUMERIC_CHECK))
                ->with('sum_price_book_return', json_encode($sum_price_book_return, JSON_NUMERIC_CHECK))
                ->with('sum_price_book_borrow', json_encode($sum_price_book_borrow, JSON_NUMERIC_CHECK))
                ->with('count_quantity_book_borrow', json_encode($count_quantity_book_borrow, JSON_NUMERIC_CHECK));
        } else {
            return view('Admin.Statistical.chart', compact('count_approve', 'count_waiting_return', 'count_book'));
        }
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {

            $subDate = Carbon::now()->subDay($request->day_select)->format('Y-m-d');
            $day_chart = BorrowedBook::whereBetween('datetime_return', [$subDate, Carbon::now()->format('Y-m-d')])->pluck('datetime_return')->toArray();

            if (count($day_chart) > 0) {
                foreach ($day_chart as $time) {
                    $count_quantity_book_return[] = BorrowedBook::CountQuantityBookReturn($time);
                    $sum_price_book_return[] = BorrowedBook::SumPriceBookReturn($time);

                    $count_quantity_book_borrow[] = BorrowedBook::CountQuantityBookBorrow($time);
                    $sum_price_book_borrow[] = BorrowedBook::SumPriceBookBorrow($time);
                }
                $data =  [
                    'day' => $day_chart,
                    'count_quantity_book_return' => $count_quantity_book_return,
                    'sum_price_book_return' => $sum_price_book_return,
                    'count_quantity_book_borrow' => $count_quantity_book_borrow,
                    'sum_price_book_borrow' => $sum_price_book_borrow,
                ];
                return response()->json($data);
            } else {
                return view('Admin.Statistical.chart');
            }
        }
    }
}
