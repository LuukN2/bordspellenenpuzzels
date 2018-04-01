@extends('layouts.master')
 
@section('Digital shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('products') !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h1>Producten</h1>
                    <a class="btn btn-primary" href="products/create">Nieuw Product</a>
                </div>
                @foreach ($products as $product)
 
                    <div class="col-sm-6 col-md-4 product">
                        <div class="thumbnail" >
                            <img src="{{$product->imageurl}}" class="img-responsive" onerror="this.src='https://risibank.fr/cache/stickers/d650/65048-full.png'">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$product->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product->description}}</p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                    <a href="/admin/products/edit/{{$product->id}}" class="btn btn-primary">Bewerken</a>
                                        <br>

                                    </div>
                                    <div class="col-md-6 col-md-offset-3">

                                        <br>
                                    <a href="/admin/products/destroy/{{$product->id}}" class="btn btn-danger">Verwijderen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 @endif
@endsection