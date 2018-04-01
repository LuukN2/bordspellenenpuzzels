@extends('layouts.master')
 
@section('Digital shop', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('categories') !!}
    <div class="whitebackground">
        <div class="row">
            <div class="col-md-12">
               
                <h1>Categoriën</h1>
                <a class="btn btn-primary" href="categories/new">Nieuwe Categorie</a>
                @foreach ($categories as $category)
                <div class="card">
                    <div class="row">
                        <h3>{{$category->name}}</h3>
                        <a class="btn btn-primary" href="categories/edit/{{$category->id}}">Bewerken</a>
                        <a class="btn btn-danger" href="categories/destroy/{{$category->id}}">Verwijderen</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
 @endif
@endsection