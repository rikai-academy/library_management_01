<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Exports\PublisherExport;
use Maatwebsite\Excel\Facades\Excel;

class PublisherController extends Controller
{
    public function index()
    {
        $data_publisher = Publisher::orderBy('created_at', 'DESC')->LoadByNamePublisher()->get();

        return view('Admin.PublisherPage.publisher', compact('data_publisher'));
    }

    public function create()
    {
        return view('Admin.PublisherPage.add_publisher');
    }

    public function store(PublisherRequest $request)
    {
        $publisher_validation = $request->all();

        $publisher = Publisher::create($publisher_validation);

        if ($publisher) {
            return redirect()->route('publisher.create')->with('success', __('message.author_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    public function edit(Publisher $publisher)
    {
        return view('Admin.PublisherPage.edit_publisher', compact('publisher'));
    }

    public function update(PublisherRequest $request, Publisher $publisher)
    {
        $publisher_validation = $request->except(['_method', '_token']);

        $publisher_update = Publisher::where('id', $publisher->id)->update($publisher_validation);

        if ($publisher_update) {
            return redirect()->route('publisher.edit', [$publisher->id])->with('update_success', __('message.update_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    public function destroy(Publisher $publisher)
    {
        if ($publisher->book->count() > 0) {
            return back()->with('fail', __('message.fail'));
        } else {
            $publisher->delete();
            return redirect()->route('publisher.index')->with('delete_success', __('message.delete_success'));
        }
    }

    public function export()
    {
        return Excel::download(new PublisherExport, 'publisher_data.xlsx');
    }
}
