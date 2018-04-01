@extends('layouts.master')
 
@section('New Product', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
@if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('new_product') !!}
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">New Product</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/product/save" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Product name" class="form-control input-md" required="true">
 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="description" required="true"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="price">Price</label>
                        <div class="col-md-9">
                            <input id="price" name="price" type="text" placeholder="Product price" class="form-control input-md" required="true">
 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Image URL</label>
                        <div class="col-md-9">
                            <input id="imageurl" name="imageurl" type="text" placeholder="Image URL" class="form-control input-md" required="true" >
 
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Type</label>
                        <div class="col-md-9">
                            <select name="type">
                                <option value="Boardgame">Bordspel</option>
                                <option value="Puzzle">Puzzel</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Categoriën</label>
                        <div class="col-md-9">
                            <select multiple name="categories[]">
                                @foreach($categories as $category)
                                    @if($category->subcategories() != false)
                                        <optgroup label="{{$category->name}}">
                                            @foreach($category->subcategories() as $sub)
                                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    @elseif($category->parent_category == null)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" name="submit" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                    
 
                </fieldset>
 
            </form>
        </div>
    </div>
@endif
@endsection
 