@if(!isset($order))
    <p style="color:red;">Error: Order variable is missing.</p>
@else
    <p>Order ID: {{ $order->id }}</p>
@endif

@extends('master')
@section('content')

<!-- Shipping Address Start -->
<div class="checkout">
    <div class="container">
        <div class="section-header text-center">
            <h2>Checkout Item</h2>
        </div>
        <div class="process-checkout">
            <ul class="progressbar">
                <li class="active">Login</li>
                <li class="active">Shipping and Billing</li>
                <li class="active">Checkout Complete</li>
                <li>Order Status</li>
            </ul>
        </div>
        <div class="summary-item">
            <div class="mt-5" style="float:center;">
                <h1>Your Order is <span class="label label-success">Success</span></h1>
                <p>We received your purchase order;<br /> Thank You for using CampusEats!</p>
            </div>
        {{-- <div class="summary-item"> 
            <div class="mt-5" style="float:center;">
                <h1>Your Order is <span class="label label-success">Success</span></h1>
                <p>We received your purchase order;<br /> Thank You for using CampusEats!</p>
                <p>Tracking No:{{$order->Tracking_No}}</p>
                <p>Total Paid: RM {{$order->O_Total_Price}}</p>
            </div> --}}
            {{-- <a href="/checkout_complete" class="btn btn-warning">Go to Order Status</a> --}}
            <a href="{{ route('checkout_complete', ['orderId' => $order->id]) }}" class="btn btn-warning">Go to Order Status</a>

        </div>
    </div>
</div>
<!-- Shipping Address End -->

@endsection