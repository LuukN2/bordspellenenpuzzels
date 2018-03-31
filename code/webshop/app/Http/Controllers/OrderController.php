<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\User;
use Redirect;

class OrderController extends Controller
{
    public function makeOrder(Request $request) {
        session_start();
       $user = \Auth::user();
       $products = $request->all();
       $orderId = 1;
       $counter = 0;
       $ids = $request->input('product_id');
       $amounts = $request->input('amount');
       $orderMax = DB::table('orders')->find(DB::table('orders')->where('user_id', $user->id)->max('id'));
        
        if($orderMax != null){
            $orderId = $orderMax->id + 1;
        }
        
        
        foreach($ids as $id){
           $amount = $amounts[$counter];
           $user->products()->attach($id, ['amount'=> $amount, 'id'=> $orderId]);
            $counter += 1;
        }
        
        unset($_SESSION['cart_contents']);
        return redirect('/');
    }
    
    public function index(){
        $user = \Auth::user();
        $orders = DB::table('orders')->select('id')->distinct()->where('user_id', $user->id)->get();
        
        return view('orders.index',['orders' => $orders]);
    }
    
    public function adminIndex(){
        $orders = DB::table('orders')->select('id','user_id')->distinct()->get();
        return view('admin.orders.index',['orders' => $orders]);
    }
    
    public function destroy(){
        $id = $_GET['id'];
        $user_id = Auth::user()->id;
        
        DB::table('orders')->where('id', $id)->where('user_id', $user_id)->delete();
        return Redirect::back();
    }
    
    public function show(){
       $id = $_GET['id'];
       $user_id = $_GET['user_id']; 
        
       $order = DB::table('orders')->where('id', $id)->where('user_id', $user_id)->get();
       $products = array();
        foreach($order as $o){
            array_push($products, [Product::find($o->product_id), $o->amount]);
        }
        return view('admin.orders.show',['products' => $products]);
    }
    
    public function userShow(){
        $id = $_GET['id'];
        $user_id = \Auth::user()->id;
        
       $order = DB::table('orders')->where('id', $id)->where('user_id', $user_id)->get();
       $products = array();
        foreach($order as $o){
            array_push($products, [Product::find($o->product_id), $o->amount]);
        }
        return view('admin.orders.show',['products' => $products]); 
    }
}
