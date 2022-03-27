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
            <h2><i class="halflings-icon user"></i><span class="break"></span>All Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width: 5%;">Id</th>
                      <th style="width: 10%;">Sub Category Name</th>
                      <th style="width: 10%;">Category Name</th>
                      <th style="width: 56%;">Description</th>
                      <th style="width: 5%;">Status</th>
                      <th style="width: 15%;">Actions</th>
                  </tr>
              </thead>   
              <tbody>
                @foreach($subCategories as $subCategory)
                  <tr>
                    <td>{{$subCategory->id}}</td>
                    <td>{{$subCategory->category_name}}</td>
                    <td>{{$subCategory->category->category_name}}</td>
                    <td class="center">{{$subCategory->category_description}}</td>
                    <td class="center">
                        @if($subCategory->category_status==1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">In Active</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($subCategory->category_status==0)
                        <a class="btn btn-success" href="{{url('/sub-category-status/'.$subCategory->id)}}">
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @else
                        <a class="btn btn-success" href="{{url('/sub-category-status/'.$subCategory->id)}}">
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @endif
                        <a class="btn btn-info" href="{{url('/sub-categories/'.$subCategory->id.'/edit')}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <form style="float: right; padding: 0; margin: 0;" action="{{url('/sub-categories/'.$subCategory->id)}}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button style="float:right;" class="btn btn-info" type="submit">
                            <i class="halflings-icon white trash"></i> 
                        </button>
                    </form>
                    </td>
                    
                </tr>
                @endforeach
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection