@extends('master')
@section('content')

<!-- Page Header Start -->
<div class="page-header-partner mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Terms Of Services</h2>
            </div>    
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <div class="col-lg-12 mt-5" style="text-align: left;">
                                @foreach($terms as $term)
                                <div class="row">
                                    <div class="col"><h5><b>{{$term['T_Topics']}}</b><h5></div>
                                </div>
                                <p>{{$term['T_Contents']}}<p>
                                    @endforeach
                            </div>
                       
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->
            </div>
        </div>                       
    </div>
</div>
</div>
@endsection