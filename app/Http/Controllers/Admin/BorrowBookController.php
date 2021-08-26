<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Services\RentalService;
use App\Services\StatusBorrowService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    public function __construct()
    {
        $this->statusBorrowService = new StatusBorrowService;
        $this->rentalService = new RentalService;
    }

    public function index($status)
    {
        $data_borrow = BorrowedBook::where('status', $status)->distinct()->get(['user_id']);
        return view('Admin.RentalBook.rental', compact('data_borrow', 'status'));
    }

    public function create()
    {
        return view('Admin.RentalBook.add_rental');
    }

    // Save many record borrow
    public function store(BorrowRequest $request)
    {
        $borrow_add = $this->rentalService->store_borrow($request);
        if ($borrow_add) {
            return redirect(route('borrow.accept_book', $request->user_id))->with('success', __('message.success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // return list with status == 1
    public function detail_borrow_book($user_id)
    {
        $status = Status::Approved;
        $data_borrow = $this->statusBorrowService->detail_borrow_book($user_id);
        return view('Admin.RentalBook.user_rental', compact('data_borrow', 'status'));
    }

    // return list with status == 2
    public function waiting_book($user_id)
    {
        $status = Status::WaitingBook;
        $data_borrow = $this->statusBorrowService->waiting_book($user_id);
        return view('Admin.RentalBook.user_rental', compact('data_borrow', 'status'));
    }

    // return list with status == 3
    public function detail_return($user_id)
    {
        $status = Status::BookReturn;
        $data_borrow = $this->statusBorrowService->detail_return($user_id);
        return view('Admin.RentalBook.user_rental', compact('data_borrow', 'status'));
    }

    // return list with status == 5
    public function accept_book($user_id)
    {
        $status = Status::BookWaitingAccept;
        $data_borrow = $this->statusBorrowService->accept_book($user_id);
        $sub_total = BorrowedBook::where([['user_id',$user_id],['status',Status::BookWaitingAccept]])->sum('sub_total');
        return view('Admin.RentalBook.user_rental', compact('data_borrow', 'status','sub_total'));
    }

    // approve many record with status == 2
    public function approve_borrow_book($user_id)
    {
        $approve_all =  $this->rentalService->approve_borrow_book($user_id);
        
        if ($approve_all) {
            return redirect(route('borrow.index', Status::WaitingBook))->with('success', __('message.approve_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // approve one record with status == 2
    public function approve($borrow_id)
    {
        $approve = $this->rentalService->approve($borrow_id);
        if ($approve) {
            return back()->with('success', __('message.approve_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // destroy one record with status == 2
    public function destroy($borrow_id)
    {
        $destroy = $this->rentalService->destroy($borrow_id);

        if ($destroy) {
            return back()->with('delete_success', __('message.delete_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // change status == 1 to status == 4 (user miss book)
    public function miss_book($borrow_id)
    {
        $miss_book = $this->rentalService->miss_book($borrow_id);
        if ($miss_book) {
            return back()->with('miss_success', __('message.miss_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // return book one record
    public function return_book($borrow_id)
    {
        $return_book = $this->rentalService->return_book($borrow_id);
        if ($return_book) {
            return back()->with('return_success', __('message.return_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // return book many record with user_id
    public function return_book_all($user_id)
    {
        $return_all = $this->rentalService->return_book_all($user_id);
        if ($return_all) {
            return redirect(route('borrow.index', 2))->with('success', __('message.approve_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // destroy borrow one record
    public function destroy_borrow($borrow_id)
    {
        $destroy = $this->rentalService->destroy_borrow($borrow_id);
        if ($destroy) {
            return back()->with('delete_success', __('message.delete_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // destroy borrow many record
    public function refuse_all($user_id)
    {
        $delete = $this->rentalService->refuse_all($user_id);
        if ($delete) {
            return redirect(route('borrow.create'))->with('delete_success', __('message.delete_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    // change status == 5 to status == 1
    public function accept_book_all($user_id)
    {
        $return_all = $this->rentalService->accept_book_all($user_id);
        if ($return_all) {
            return redirect(route('borrow.index', 1))->with('success', __('message.approve_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    public function reject_all($user_id)
    {
        $reject_all = $this->rentalService->reject_all($user_id);
        if ($reject_all) {
            return redirect(route('borrow.index', 6))->with('success', __('message.approve_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }


}
