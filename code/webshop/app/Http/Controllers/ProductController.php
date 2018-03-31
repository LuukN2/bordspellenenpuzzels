<?php
 
namespace App\Http\Controllers;
 
use App\Product;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
 
class ProductController extends Controller
{
    public function boardGames(){
        $products = Product::all()->where('type', "Boardgame"); 
        return view('.products.index',['products' => $products, 'type' => "Bordspellen"]);
    }
    
    public function puzzles(){
        $products = Product::all()->where('type', "Puzzle"); 
        return view('.products.index',['products' => $products, 'type' => "Puzzels"]);
    }
    
    public function adminIndex(){
        $products = Product::all();
        return view('admin.products.index',['products' => $products]);
    }
 
    public function destroy($id){
        Product::destroy($id);
        return redirect('/admin/products');
    }
    
    public function save(Request $request){
        $input = $request->except(['_token','submit']);

        Product::find($request->id)->update($input);
        
        return redirect('/admin/products');
    }
    
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all()->where('parent_id',null);
        return view('admin.products.edit',['product' => $product, 'categories' => $categories]);
    }
 
    public function newProduct(){
        $categories = Category::all()->where('parent_id',null);
        return view('admin.products.new',['categories' => $categories]);
    }
 
    public function add(Request $request) {
        $input = $request->all();

        Product::create($input);
 
 
 
        return redirect('/admin/products');
 
    }
}
 