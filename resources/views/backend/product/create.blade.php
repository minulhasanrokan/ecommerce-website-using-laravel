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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

        </div>

        <div class="box-content">
            <form  class="form-horizontal" action="{{url('/products/')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Code</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_code" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_name" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Select Category</label>
                        <div class="controls">
                            <select  name="category_name" id="category_name">
                                <option>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Select Sub Category</label>
                        <div class="controls">
                            <select id="sub_category_name"  name="sub_category_name">
                                <option>Select Category First</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Select Brand</label>
                        <div class="controls">
                            <select name="brand_id">
                                <option>Select Brand</option>
                                
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Select Unit</label>
                        <div class="controls">
                            <select name="unit_id">
                                <option>Select Unit</option>
                                
                                @foreach($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Select Size</label>
                        <div class="controls">
                            <select name="size_id">
                                <option>Select Size</option>
                                
                                @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Select Color</label>
                        <div class="controls">
                            <select name="color_id">
                                <option>Select Color</option>
                                
                                @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="product_description" rows="3" required></textarea>
                        </div>

                    </div>

                    <div class="control-group">
                        <label class="control-label">Product Inage</label>
                        <div class="controls">
                            <input type="file" name="product_image[]" multiple="multiple">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Product Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_price" required>
                        </div>

                    </div>

                    <div class="form-actions">
                        <button style="float:right" type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
</div><!--/row-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// when district dropdown changes
$('#category_name').change(function() {

    var category_name = $(this).val();

    if (category_name) {

        $.ajax({
            type: "GET",
            url: "{{ url('get-sub-category') }}/"+ category_name,
            success: function(res) {

                if (res) {

                    $("#sub_category_name").empty();
                    $("#sub_category_name").append('<option>Select Sub Category</option>');
                    $.each(res, function(key, value) {
                        $("#sub_category_name").append('<option value="' + key + '">' + value +
                            '</option>');
                    });

                } else {

                    $("#sub_category_name").empty();
                }
            }
        });
    } else {

        $("#sub_category_name").empty();
    }
});
</script>
@endsection