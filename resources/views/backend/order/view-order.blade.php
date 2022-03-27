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
<div class="row" >

        <div class="invoice">
            <a role="button" class="btn btn-info" href="#" style="float: right;">Invoice</a>
        </div>

    </div>

    <br>
    <div class="row-fluid sortable">
        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Information</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Mobile No</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order->customer->name}}</td>
                        <td class="center">{{$order->customer->phone}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div><!--/span-->




        <div class="box span6">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Shipping Address</th>
                        <th>Mobile No</th>
                        <th>Email Address</th>
                        <th>Payment Method</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$order->shipping->name}}</td>
                        <td class="center">{{$order->shipping->address}}</td>
                        <td class="center">{{$order->shipping->mobile}}</td>
                        <td class="center">{{$order->shipping->mobile}}</td>
                        <td class="center">{{$order->payment->payment_method}}</td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div><!--/span-->




        <div class="box span12" style="margin-left: auto;">
            <div class="box-header">
                <h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orderDetails as $order_details)
                        <tr>
                            <td>{{$order_details->order_id}}</td>
                            <td class="center">{{$order_details->product_name}}</td>
                            <td class="center">&#2547; {{$order_details->product_price}}</td>
                            <td class="center">{{$order_details->product_sale_qauntity}}</td>
                            <td class="center"> &#2547; {{$order_details->product_price*$order_details->product_sale_qauntity}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="4" style="font-size: 20px;font-weight: 521;text-align: right; color: red"> Total Amount to pay</td>
                        <td><strong style="font-size: 20px; color: #007cff;">&#2547; {{$order->total}} </strong></td>
                    </tr>
                    </tfoot>
                </table>


            </div>
        </div><!--/span-->


    </div><!--/row-->

@endsection