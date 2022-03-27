@extends('backend.admin-master')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
<div style="padding: 10px; background: green; color: white;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  {{session()->get('message')}}
</div>
@endif
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub Category</h2>
        </div>
        <div class="box-content">
            <form  class="form-horizontal" action="{{url('/sub-categories/'.$subCategory->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Sub Category Name</label>
                        <div class="controls">
                            <input type="text" value="{{$subCategory->category_name}}" class="input-xlarge" name="category_name" required>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Select Category</label>
                        <div class="controls">
                            <select name="category">
                                <option>Select Category</option>
                                @foreach($categories as $category)
                                <option @if($category->id==$subCategory->cat_id){{"selected"}}@endif value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Sub Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="category_description" rows="3" required>{{$subCategory->category_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Sub Category</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->
@endsection