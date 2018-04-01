@extends('layouts.master') @section('Digital shop', 'Page Title') @section('sidebar') @parent @endsection @section('content')
{!! Breadcrumbs::render(strtolower($type)) !!}
<div class="card">
    <h1>{{$type}}</h1>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($products as $product)

            <div class="col-sm-6 col-md-4 product">
                <div class="thumbnail">
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
                                <a href="/cart/add/{{$product->id}}" class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span> Buy</a></div>
                        </div>
                        <h4>Categoriën</h4>
                        <div class="row">
                            <div class="categories">
                                @foreach($product->categories as $category) 
                                @if($category->subcategories() != false)
                                <div>
                                    <label><b>{{$category->name}}</b></label> 
                                    @foreach($category->subcategories() as $sub)
                                    <div>
                                        <p>{{$sub->name}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                @elseif($category->parent_category == null)
                                <label><b>{{$category->name}}</b></label> 
                                @endif 
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection