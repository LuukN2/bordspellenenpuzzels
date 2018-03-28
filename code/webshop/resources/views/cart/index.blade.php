@extends('layouts.master')
 
@section('Digital shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
<form method="POST" action="/cart/save" class="form-horizontal" enctype="multipart/form-data" role="form">
    {!! csrf_field() !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cartcontainer">
                @foreach ($products as $product)
                    <div>
                        <input type="hidden" name="product_id[]" value="{{$product->id}}">
                        <h3>{{$product->name}}</h3>
                        <p>Price: {{$product->price}}</p>
                        <p>Amount: </p><input type="number" name="amount[]" value="{{$product->amount}}">
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <br>
        @if (Auth::check())
        <input type="submit" class="btn btn-primary" value="Order products">
        @else
        <a href="/login" class="btn btn-primary">Order products</a>
        @endif
    </div>
</form>
@endsection