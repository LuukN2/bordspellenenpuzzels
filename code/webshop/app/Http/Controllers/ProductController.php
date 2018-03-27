<?php
 
namespace App\Http\Controllers;
 
use App\Product;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;

 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
 
class ProductController extends Controller
{
 
    public function index(){
        $products = Product::all();
        return view('admin.products',['products' => $products]);
    }
 
    public function destroy($id){
        Product::destroy($id);
        return redirect('/admin/products');
    }
 
    public function newProduct(){
        return view('admin.new');
    }
 
    public function add(Request $request) {
        $input = $request->all();

        Product::create($input);
 
        //$product->save();
 
        return redirect('/admin/products');
 
    }
}
 