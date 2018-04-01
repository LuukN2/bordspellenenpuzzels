@extends('layouts.master')
 
@section('Digital shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
{!! Breadcrumbs::render('cart') !!}
@if(count($products) > 0)
<script type="text/javascript" src="/js/cart.js"></script>
<script type="text/javascript">
window.addEventListener("load", function () {
    setTimeout(calculatePrice, 500);}, false);
</script>
<form method="POST" action="/cart/save" class="form-horizontal" enctype="multipart/form-data" role="form">
    {!! csrf_field() !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cartcontainer">
                @foreach ($products as $product)
                    <div>
                        <input class="product_price" type="hidden" value="{{$product->price}}">
                        <input type="hidden" name="product_id[]" value="{{$product->id}}">
                        <h3>{{$product->name}}</h3>
                        <p>Price: {{$product->price}}</p>
                        <p>Amount: </p><input class="product_amount" onchange="calculatePrice()" type="number" id="quantity" name="amount[]" value="{{$product->amount}}">
                        <a class="btn btn-danger" href="/cart/destroy/{{$product->id}}">Verwijder artikel</a>
                    </div>
                @endforeach
                    <h2>Totaalprijs:</h2><h2 id="output"></h2>
                </div>
            </div>
        </div>
        <br>
        
        @if (Auth::check())
        <input type="submit" class="btn btn-primary" value="Order products">
        @else
        <a href="/login" class="btn btn-primary" >Bestel producten</a>
        @endif
    </div>

</form>
@else
<div class="cartcontainer">
<h1>Je winkelwagen is leeg! Bestel iets jij suffie!</h1>
</div>
@endif

@endsection