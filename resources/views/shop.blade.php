@extends('master')
@section('content')

<!-- List Shop Start -->

<div class="shop">
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center">
                        <h2>All Shop for {{$category->S_Cat_Slug}}</h2>
                    </div>
                    <div class="row">
                        @foreach ($shop as $shop)
                            <div class="col-md-3 mb-3"> 
                                <a href = "{{ url('view-shop/'.$category->S_Cat_Slug.'/'.$shop->S_Name) }}">
                                    <div class="card">
                                        <img src="{{asset('images/'. $shop->S_Image)}}" alt="Shop Image">
                                        <div class="card-body">
                                            <h5>{{$shop->S_Name}}</h5>
                                            <span class="float-start">{{$shop->S_Description}}</span>
                                            
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