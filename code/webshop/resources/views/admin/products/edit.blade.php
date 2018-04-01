@extends('layouts.master')
 
@section('New Product', 'Page Title')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
    @if(Auth::User()->admin == 1)
    {!! Breadcrumbs::render('edit_product', $product) !!}
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">New Product</div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="/admin/products/editsave" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Product name" class="form-control input-md" required="" value="{{$product->name}}">
 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="description" value="{{$product->description}}">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="price">Price</label>
                        <div class="col-md-9">
                            <input id="price" name="price" type="number" placeholder="Product price" class="form-control input-md" required="" value="{{$product->price}}">
 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Image URL</label>
                        <div class="col-md-9">
                            <input id="imageurl" name="imageurl" type="text" placeholder="Image URL" class="form-control input-md" value="{{$product->imageurl}}">
 
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label" for="imageurl">Type</label>
                        <div class="col-md-9">
                             <select name="type">
                                 @if($product->type == "Boardgame")
                                 <option value="Boardgame" selected="true">Bordspel</option>
                                 <option value="Puzzle">Puzzel</option>
                                 @else
                                 <option value="Boardgame">Bordspel</option>
                                 <option value="Puzzle" selected="true">Puzzel</option>
                                 @endif
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
                                                @if(in_array($sub->id, $preselected))
                                                    <option value="{{$sub->id}}" selected="true">{{$sub->name}}</option>
                                                @else
                                                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @elseif($category->parent_category == null)
                                         @if(in_array($category->id, $preselected))
                                            <option value="{{$category->id}}" selected="true">{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
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
 