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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Unit</h2>

        </div>

        <div class="box-content">
            <form  class="form-horizontal" action="{{url('/units/')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Unit Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="unit_name" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="textarea2">Unit Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="unit_description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button style="float:right" type="submit" class="btn btn-primary">Add Unit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div><!--/span-->
</div><!--/row-->
@endsection