<?php
 
namespace App\Http\Controllers;
 
use App\Product;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Auth;
 
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
        
        $categories = $request->input('categories');
        $product = Product::find($request->id);
        DB::table('category_product')->where('product_id',$request->id)->delete();
        $this->attachCategories($categories, $product);
        
        
        return redirect('/admin/products');
    }
    
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all()->where('parent_id',null);
        $preselected = DB::table('category_product')->where('product_id',$id)->pluck('category_id')->toArray();
        
        return view('admin.products.edit',['product' => $product, 'categories' => $categories, 'preselected' => $preselected]);
    }
 
    public function newProduct(){
        $categories = Category::all()->where('parent_id',null);
        return view('admin.products.new',['categories' => $categories]);
    }
 
    public function add(Request $request) {
        $input = $request->all();

        $product = Product::create($input);
        
        $categories = $request->input('categories');
        $this->attachCategories($categories, $product);

        return redirect('/admin/products');
    }
    
    private function attachCategories($categories, $product){
        $parents = array();
        if($categories == null){
            return redirect('/admin/products');
        }
        
        foreach($categories as $category){
            $c = Category::find($category);
            Product::find($product->id)->categories()->attach($category);
            if($c->parent_category != null){
                if(!in_array($c->parent_category, $parents)){
                    array_push($parents, $c->parent_category);
                    Product::find($product->id)->categories()->attach(Category::find($c->parent_category));
                }
                
            }
        }
    }
}
 