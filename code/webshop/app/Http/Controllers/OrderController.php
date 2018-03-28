<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class OrderController extends Controller
{
    public function makeOrder(Request $request) {
       $user = \Auth::user();
       $products = $request->all();
       $counter = 0;
       $ids = $request->input('product_id');
       $amounts = $request->input('amount');
        
        foreach($ids as $id){
           $amount = $amounts[$counter];
           $user->products()->attach($id, ['amount'=> $amount]);
            $counter += 1;
        }
        unset($_SESSION['cart_contents'])
        return redirect('/');
    }
}
