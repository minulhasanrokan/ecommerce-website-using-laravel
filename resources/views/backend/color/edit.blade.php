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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product Colors</h2>

        </div>

        <div class="box-content">
            <form  class="form-horizontal" action="{{url('/colors/'.$color->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Colors Name</label>
                        <div class="controls">
                            <input value="{{implode(',',json_decode($color->color))}}" id="input-size" style="width:100%" data-role="tagsinput" type="text" class="input-xlarge" name="color" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button style="float:right" type="submit" class="btn btn-primary">Update Colors</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->

@endsection