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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>

        </div>

        <div class="box-content">
            <form  class="form-horizontal" action="{{url('/categories/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Category Name</label>
                        <div class="controls">
                            <input type="text" value="{{$category->category_name}}" class="input-xlarge" name="category_name" required>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="category_description" rows="3" required>{{$category->category_description}}</textarea>
                        </div>

                    </div>

                    <div class="control-group">
                        <label class="control-label">File Upload</label>
                        <div class="controls">
                            <img style="width: 50px;" src="{{asset('/category/'.$category->category_image)}}">
                            <input type="file" name="category_image">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
@endsection