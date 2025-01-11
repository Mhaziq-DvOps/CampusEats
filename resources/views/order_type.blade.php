@extends('master')
@section('content')

<!-- Service Start -->
<div class="service">
    <div class="shop-info">
        <div class="shop-text">
            <h3>{{$shop->S_Name}} <span>Information</span></h3>
            <p>Business Hour: <span>9.00am until 9.00pm</span></p>
            <p>{{$shop->S_Description}}</p>
        </div>
    </div>
    <div class="service-item">
        <div class="service-text">
            <h1><span>Choose Order Type</span></h1>
            @if($shop->Dine_In =='0')
            <div class="row">
                <div class="service-btn inline-block">
                    <button type="submit" name="otype" value="dineIn" class="btn custom-btn disabled">Dine In</button>
                </div>
                <form method="GET" action="/catalogue">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="catalogue"><button type="submit" name="otype" value="pickUp"
                                class="btn custom-btn -btn">Pickup</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="delivery"
                                class="btn custom-btn">Delivery</button></a>
                    </div>
                </form>
                <form method="GET" action="/booking">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="booking"><button type="submit" name="otype" value="booking"
                                class="btn custom-btn">Booking</button></a>
                    </div>
                </form>
            </div>
            @elseif($shop->Booking =='0')
            <div class="row">
                <form method="GET" action="/catalogue">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="catalogue"><button type="submit" name="otype" value="dineIn"
                                class="btn custom-btn">Dine In</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="pickUp"
                                class="btn custom-btn -btn">Pickup</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="delivery"
                                class="btn custom-btn">Delivery</button></a>
                    </div>
                </form>

                <div class="service-btn inline-block">
                    <button type="submit" name="otype" value="booking" class="btn custom-btn disabled">Booking</button>
                </div>

            </div>
            @elseif($shop->Delivery =='0')
            <div class="row">
                <form method="GET" action="/catalogue">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="catalogue"><button type="submit" name="otype" value="dineIn"
                                class="btn custom-btn">Dine In</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="pickUp"
                                class="btn custom-btn -btn">Pickup</button></a>
                    </div>
                </form>
                <div class="service-btn inline-block">
                    <button type="submit" name="otype" value="delivery"
                        class="btn custom-btn disabled">Delivery</button>
                </div>
                <form method="GET" action="/booking">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="booking"><button type="submit" name="otype" value="booking"
                                class="btn custom-btn">Booking</button></a>
                    </div>
                </form>
            </div>
            @elseif($shop->Pick_Up =='0')
            <div class="row">
                <form method="GET" action="/catalogue">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="catalogue"><button type="submit" name="otype" value="dineIn"
                                class="btn custom-btn">Dine In</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="delivery"
                                class="btn custom-btn">Delivery</button></a>
                    </div>
                </form>
                <div class="service-btn inline-block">
                    <button type="submit" name="otype" value="pickup" class="btn custom-btn disabled">Pickup</button>
                </div>
                <form method="GET" action="/booking">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="booking"><button type="submit" name="otype" value="booking"
                                class="btn custom-btn">Booking</button></a>
                    </div>
                </form>
            </div>
            @else
            <div class="row">
                <form method="GET" action="/catalogue">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="catalogue"><button type="submit" name="otype" value="dineIn"
                                class="btn custom-btn">Dine In</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="pickUp"
                                class="btn custom-btn">Pickup</button></a>
                        <a href="catalogue"><button type="submit" name="otype" value="delivery"
                                class="btn custom-btn">Delivery</button></a>
                    </div>
                </form>
                <form method="GET" action="/booking">
                    @csrf
                    <div class="service-btn inline-block">
                        <a href="booking"><button type="submit" name="otype" value="booking"
                                class="btn custom-btn">Booking</button></a>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- Service End -->

@endsection