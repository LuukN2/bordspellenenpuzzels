@extends('layouts.master') @section('Orders', 'Page Title') @section('sidebar') @parent @endsection @section('content')
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
                            </div>
                            <div>
                                <a class="btn btn-primary" href="orders/show?id={{$order->id}}">Bekijk bestelling</a>
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