<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function __construct(){
        session_start();
        
        if(!isset($_SESSION['cart_contents'])){
            $_SESSION['cart_contents'] = array();
        }
    }
    
    public function index(){
        $products = array();
        
        foreach($_SESSION['cart_contents'] as $item){
            $id = $item[0];
            $amount = $item[1];
            $product = Product::find($id);
            $product->amount = $amount;
            array_push($products, $product);
        }
        
        return view('cart.index',['products' => $products]);
    }
    
    public function add ($id){
        $data = array($id, 1);
        $index = 0;
        foreach($_SESSION['cart_contents'] AS $item){
            if(isset($item[0]) && $item[0] == $id){
                
                $updatedItem = $item;
                $updatedItem[1] += 1;
                $_SESSION['cart_contents'][$index] = $updatedItem;
                
                return redirect('/products');
            }
            $index += 1;
        }
        
        array_push($_SESSION['cart_contents'],$data);
        
        return redirect('/products');

    }
    
    public function order($products){
        
    }
}
?>