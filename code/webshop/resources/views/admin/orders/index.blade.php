@extends('layouts.master') @section('Orders', 'Page Title') @section('sidebar') @parent @endsection @section('content')
@if(Auth::User()->admin == 1)
{!! Breadcrumbs::render('orders') !!}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($orders as $order)

            <div class="col-sm-6 col-md-4 product">
                <div class="thumbnail">

                    <div class="caption">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <h3>Bestelling {{$order->id}}</h3>
                                <h4>Van gebruiker {{$order->user_id}}</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="orders/show?id={{$order->id}}&user_id={{$order->user_id}}">Bekijk bestelling</a>
                                <br>
                                <br>
                                <a class="btn btn-danger" href="orders/destroy?id={{$order->id}}&user_id={{$order->user_id}}">Verwijder bestelling</a>
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