<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view ('admin.categories.index',compact('categories',$categories));
    }
    
    public function new(){
        $categories = Category::where('parent_category', null)->get();
        return view('admin.categories.new',compact('categories',$categories));
    }
    
    public function add(Request $request) {
        $input = $request->all();

        Category::create($input);

        return redirect('/admin/categories');
    }
    
    public function edit($id){
        $categories = Category::where('parent_category', null)->get();
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }
    
    public function save(Request $request) {
        $input = $request->except(['_token','submit']);

        Category::find($request->id)->update($input);
        
        return redirect('/admin/categories');
    }
    
    public function destroy($id){
        Category::destroy($id);
        return redirect('/admin/categories');
    }
}
