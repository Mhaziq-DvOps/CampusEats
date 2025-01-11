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
                <p>We received your purchase order;<br /> Thank You for using AppXilon!</p>
            </div>
            <a href="/checkout_complete" class="btn btn-warning">Go to Order Status</a>
        </div>
    </div>
</div>
<!-- Shipping Address End -->

@endsection