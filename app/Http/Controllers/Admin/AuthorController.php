<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Exports\AuthorExport;
use Maatwebsite\Excel\Facades\Excel;
class AuthorController extends Controller
{
    public function index()
    {
        $data_author = Author::orderBy('created_at','DESC')->LoadByNameAuthor()->get();
        
        if(isset(request()->name)){
            $search_for = request()->name;
        }else{
            $search_for = __('message.search_for');
        }

        return view('Admin.AuthorPage.author',compact('data_author','search_for'));
    }

    public function create()
    {
        return view('Admin.AuthorPage.add_author');
    }

    public function store(AuthorRequest $request)
    {
        $author_validation = $request ->all();

        $author = Author::create($author_validation);

        if($author){         
            return redirect()->route('author.create')->with('success',__('message.author_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function edit(Author $author)
    {
        return view('Admin.AuthorPage.edit_author',compact('author'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author_validation = $request->except(['_method', '_token']);

        $author_update = Author::where('id',$author->id)->update($author_validation);

        if($author_update){       
            return redirect()->route('author.edit', [$author->id])->with('update_success',__('message.update_success') );
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function destroy(Author $author)
    {
        if($author->book->count() > 0){
            return back()->with('fail',__('message.fail'));
        }else{
            $author->delete();
            return redirect()->route('author.index')->with('delete_success',__('message.delete_success') );
        }
    }

    public function export()
    {
      return Excel::download(new AuthorExport, 'author_data.xlsx');
    }
}
