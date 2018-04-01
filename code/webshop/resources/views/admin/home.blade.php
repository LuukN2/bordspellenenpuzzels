@extends('layouts.master') @section('Digital shop', 'Page Title') @section('sidebar') @parent @endsection @section('content') @if(Auth::User()->admin == 1)
{!! Breadcrumbs::render('admin') !!}
<div class="container">
    <div class="whitebackground">
        <div class="row">
            <div class="col-md-12">

                @foreach ($navigations as $navigation)

                <div class="col-sm-6 col-md-4 product">

                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <h3>{{$navigation->name}}</h3>
                        </div>
                        <div class="col-md-6 col-xs-6 price">
                            <a class="btn btn-primary" href="{{'http://'.Request::getHttpHost().'/'.$navigation->url}}">Beheren</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endif @endsection