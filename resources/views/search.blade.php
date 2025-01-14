@extends('master')
@section('content')

<!-- Search Display Product Start -->

<h2 class="widget-title">Product Search Result</h2>
<div class="recent-post">
    <div class="post-item">
        @foreach($product as $item)
        <div class="post-img" style="height:250px; width:250px;">
            <img src="{{asset('images/'. $item->P_Image)}}">
        </div>
        <div class="post-text">
            <p> {{$item['P_Name']}}</p>
    </div>
        @endforeach
    </div>
</div>

<!-- Search Display Product End -->
@endsection
