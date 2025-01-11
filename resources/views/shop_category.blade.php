@extends('master')
@section('content')

<!-- List Shop Start -->

<div class="shop">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center">
                        <h2>All Shop Categories</h2>
                    </div>
                    <div class="row">
                        @foreach ($shopcat as $shop)
                            <div class="col-md-3 mb-3"> 
                                <a href="view-shop/{{$shop->S_Cat_Slug}}">
                                    <div class="card">
                                        <img src="asset/img/CampusEatsLogo.png" alt="Shop Image">
                                        <div class="card-body">
                                            <h5>{{$shop->S_Cat_Slug}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection