@extends('master')
@section('content')

<!-- Customer Order History Start -->
<div class="container bootdey">
    <div class="panel panel-default panel-order">
        <div class="panel-heading">
            <strong>Order history</strong>
            <div class="btn-group pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Filter history <i class="fa fa-filter"></i></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#">Approved orders</a></li>
                        <li><a href="#">Pending orders</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel-body">
        @foreach($order as $item)
            <div class="row">
                <div class="col-md-1">
                    <a href="history_detail/{{$item->id}}"><span><strong>{{$item->Tracking_No}}</strong></span><br /></a>
                </div>
                <div class="col-md-11">
                    <div class="row">
                        @if($item->O_Status == '1')
                        <div class="col-md-12">
                            <a href="{{ url('invoice-order/' . $item->id) }}"><div class="pull-right"><label class="label label-warning">Print Invoice</label></div></a>
                            <div class="pull-right"><label class="label label-success mr-2">Completed</label></div>
                            
                            @if($item->O_Type == 'dineIn')
                            <div class="pull-right"><label class="label label-primary mr-2">Dine In</label></div>
                            @elseif($item->O_Type == 'booking')
                            <div class="pull-right"><label class="label mr-2" style="background-color: pink;">Booking</label></div>
                            @elseif($item->O_Type == 'pickUp')
                            <div class="pull-right"><label class="label label-info mr-2">Pick Up</label></div>
                            @else
                            <div class="pull-right"><label class="label label-default mr-2">Delivery</label></div>
                            @endif
                            Total Price: RM{{ number_format((float) $item->O_Total_Price, 2, '.', '') }} <br />
                            
                        </div>
                        @else
                        <div class="col-md-12">
                            <a href="{{ url('invoice-order/' . $item->id) }}"><div class="pull-right"><label class="label label-warning">Print Invoice</label></div></a>
                            <div class="pull-right"><label class="label label-danger">Canceled</label></div>
                            @if($item->O_Type == 'dineIn')
                            <div class="pull-right"><label class="label label-warning mr-2">Dine In</label></div>
                            @elseif($item->O_Type == 'booking')
                            <div class="pull-right"><label class="label mr-2" style="background-color: pink;">Booking</label></div>
                            @elseif($item->O_Type == 'pickUp')
                            <div class="pull-right"><label class="label label-warning mr-2">Pick Up</label></div>
                            @else
                            <div class="pull-right"><label class="label label-warning mr-2">Delivery</label></div>
                            @endif
                            Total Price: RM{{ number_format((float) $item->O_Total_Price, 2, '.', '') }} <br />
                        </div>
                        @endif
                        <div class="col-md-12">Order made on: {{$item->created_at}}</div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection