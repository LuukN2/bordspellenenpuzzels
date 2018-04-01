@extends('layouts.master')
 
@section('Nieuwe Category', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('edit_category', $category) !!}
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Nieuwe Categorie</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/categories/save" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <input type="hidden" name="id" value="{{$category->id}}">
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Naam</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Naam Categorie" class="form-control input-md" required="true" value="{{$category->name}}">
 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Subcategorie van</label>
                        <div class="col-md-9">
                            <select name="parent_category">
                                <option value=""></option>
                                @foreach($categories as $c)
                                @if($c->id == $category->parent_category)
                                    <option value="{{$c->id}}" selected="true">{{$c->name}}
                                @elseif($c->id != $category->id)
                                    <option value="{{$c->id}}">{{$c->name}} 
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-9">
                            <input type="submit" class="btn btn-primary" value="Bewerk Categorie">
                        </div>
                    </div>
                    
                </fieldset>
            </form>
        </div>
    </div>
@endif
@endsection
 