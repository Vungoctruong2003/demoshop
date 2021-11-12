<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }
public function store(Request $request){
    $category = new Category();
    $category->name = $request->name;
    $category->save();
    Session::flash('success', 'Thêm mới tỉnh thành thành công');
    return redirect()->route('category.index');
}
public function destroy($id){
        $category = Category::findOrFail($id);
        $category->products()->delete();
        $category->delete();
        return redirect()->route('category.index');
}
public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
}
    public function update(Request $request,$id){
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index');
    }
}
