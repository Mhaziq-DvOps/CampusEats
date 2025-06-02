@extends('master')
@section('content')

<div class="container my-5">
    {{-- <h2 class="widget-title text-center mb-4">Search Results</h2> --}}

    <h2 class="widget-title text-center mb-4">
    Search Results for <span class="text-primary">"{{ $query }}"</span>
</h2>
    <div class="row">
        @if($promotedProducts && count($promotedProducts) > 0)
            @foreach ($promotedProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/' . $product->P_Image) }}" class="card-img-top" alt="{{ $product->P_Name }}" style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-danger">{{ $product->P_Name }}</h5>
                            <p class="card-text">{{ Str::limit($product->S_Description, limit: 70) }}</p>

                            @if($product->P_Disc_Price && $product->P_Disc_Price < $product->P_Price)
                                <p class="mb-1 text-decoration-line-through text-muted">RM{{ number_format($product->P_Price, 2) }}</p>
                                <h5 class="text-success fw-bold">Now Only RM{{ number_format($product->P_Disc_Price, 2) }} !</h5>
                              <a href="{{ url('catalogue', $product->P_Id) }}" class="btn btn-danger btn-sm mt-auto">Get Deal</a>

                            @else
                                <p class="text-dark">Price: RM{{ number_format($product->P_Price, 2) }}</p>
                                 <a href="{{ url('catalogue', $product->P_Id) }}" class="btn btn-primary btn-sm mt-auto">Buy Now</a>

                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">No products found.</p>
            </div>
        @endif
    </div>
</div>

@endsection
