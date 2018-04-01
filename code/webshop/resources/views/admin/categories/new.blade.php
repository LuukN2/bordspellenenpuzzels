@extends('layouts.master')
 
@section('Nieuwe Category', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('new_category') !!}
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Nieuwe Categorie</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/categories/add" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Naam</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Naam Categorie" class="form-control input-md" required="true">
 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Subcategorie van</label>
                        <div class="col-md-9">
                            <select name="parent_category">
                                <option value=""></option>
                                @foreach($categories as $category){
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-primary" value="Maak Categorie">
                        </div>
                    </div>
                    
                </fieldset>
            </form>
        </div>
    </div>
@endif
@endsection
 