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
                <p class="alert-success">
                    <?php

                    $message = Session::get('message');
                    if($message)
                    {
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>

            </div>


            <div class="box-content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date & Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                        <tbody>
                            @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td class="center">{{$order->customer->name}}</td>
                            <td class="center">{{$order->total}}</td>
                            <td class="center">{{\Carbon\Carbon::parse($order->created_at)->format('M d, Y, h:iA')}}</td>

                            <td class="center">

                                <span class="label label-success">Active</span>

                                <span class="label label-danger">Unactive</span>

                            </td>
                            <td class="center">

                                <a class="btn btn-danger" href="#">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>

                                <a class="btn btn-success" href="#">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>

                                <a class="btn btn-info" href="{{url('/view-order/'.$order->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="#" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>

                 

                </table>
           

            </div>
        </div>

    </div>

@endsection