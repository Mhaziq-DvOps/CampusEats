@extends('master')
@section('content')

<!-- Shipping Address Start -->
<div class="checkout">
    <div class="container">
        <div class="section-header text-center">
            <h2>Checkout Item</h2>
        </div>
        @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">{{ \Session::get('success') }}</div>
            {{ \Session::forget('success') }}
        @endif
        <div class="process-checkout">
            <ul class="progressbar">
                <li class="active">Login</li>
                <li class="active">Shipping and Billing</li>
                <li class="active">Checkout Complete</li>
                <li class="active">Order Status</li>
            </ul>
        </div>

        <ol class="progtrckr" data-progtrckr-steps="5">
            <li class="progtrckr-done">Order Recieve</li><!--
            --><li class="progtrckr-todo">Preparing</li><!--
            --><li class="progtrckr-todo">Ready</li><!--
            --><li class="progtrckr-todo">Complete</li><!--
            --><li class="progtrckr-todo">Delivered</li>
        </ol>

    </div>
</div>

@endsection
