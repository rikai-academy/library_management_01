<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryPostRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data_cate = Category::orderBy('created_at', 'DESC')->LoadByNameCate()->get();

        if (isset(request()->name)) {
            $search_for = request()->name;
        } else {
            $search_for = __('message.search_for');
        }

        return view('Admin.CategoryPage.cate', compact('data_cate', 'search_for'));
    }

    public function create()
    {
        return view('Admin.CategoryPage.add_cate');
    }

    public function store(CategoryRequest $request)
    {
        $cate_validation = $request->all();

        $cate_save = Category::create($cate_validation);

        if ($cate_save) {
            return redirect()->route('category.create')->with('success', __('message.cate_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    public function edit(Category $category)
    {
        return view('Admin.CategoryPage.edit_cate', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $cate_validation = $request->all();

        $cate_update = Category::where('id', $category->id)->update($cate_validation);

        if ($cate_update) {
            return redirect()->route('category.edit', [$cate_update])->with('update_success', __('message.update_success'));
        } else {
            return back()->with('fail', __('message.fail'));
        }
    }

    public function destroy(Category $category)
    {
        if ($category->book->count() > 0) {
            return back()->with('fail', __('message.fail'));
        } else {
            $category->delete();
            return redirect()->route('category.index')->with('delete_success', __('message.delete_success'));
        }
    }
}
