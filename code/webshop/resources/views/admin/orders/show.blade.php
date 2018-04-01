@extends('layouts.master')
 
@section('Digital shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('show_order') !!}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($products as $product)
 
                    <div class="col-sm-6 col-md-4 product">
                        <div class="thumbnail" >
                            <img src="{{$product[0]->imageurl}}" class="img-responsive" onerror="this.src='https://risibank.fr/cache/stickers/d650/65048-full.png'">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3>{{$product[0]->name}}</h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>${{$product[0]->price}}</label></h3>
                                    </div>
                                </div>
                                <p>{{$product[0]->description}}</p>
                                <p>Hoeveelheid: {{$product[1]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 @endif
@endsection