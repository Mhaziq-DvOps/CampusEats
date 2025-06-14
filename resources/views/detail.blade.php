
@extends('master')
@section('content')

@php use Carbon\Carbon; @endphp





<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Product Details</h2>
            </div>
            <div class="col-12">
                <a href="index">Home</a>
                <a href="/detail">Product Details</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Single Post Start-->
<div class="single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-content">
                    <img src="{{asset('images/'. $detail['P_Image'])}}" />
                    <h2>{{$detail['P_Name']}}</h2>
                    @if($detail['P_Status'] == 1)
                    <label class="badge bg-success">In Stock</label>
                    @else
                    <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <p>
                        {{$detail['L_Description']}}
                    </p>

                    @if($detail['P_Status'] == 1)
                    {{-- <div class="menu-cart">
                        <form action="/add_to_cart" method="POST">
                            @csrf
                            <input type="hidden" name="Pro_Id" value="{{$detail['P_Id']}}">
                            <button class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                        </form>
                    </div>
                    @else
                    <div class="menu-cart">
                        <input type="hidden" name="Pro_Id" value="{{$detail['P_Id']}}">
                        <button disabled class="btn btn-primary"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                    @endif

                </div> --}}

                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="Pro_Id" value="{{ $detail['P_Id'] }}">
                    
                    {{-- Add quantity input --}}
                    <div class="form-group mt-2 mb-2">
                        <label for="Pro_Qty">Quantity:</label>
                        <input type="number" name="Pro_qty" id="Pro_qty" class="form-control" min="1" value="1" required>
                    </div>
                
                    <button class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                </form>
            @else
                <input type="hidden" name="Pro_Id" value="{{ $detail['P_Id'] }}">
                <button disabled class="btn btn-primary">
                    <i class="fa fa-shopping-cart"></i> Out of Stock
                </button>
            @endif
        </div>
        


                <div class="single-tags">
                    <a href="">Farah Food Hub</a>
                    <a href="">CampusEats</a>
                    <a href="">Food</a>
                </div>

            <div class="single-comment">
    <h2>Reviews</h2>

    @foreach ($review as $reviews)
        <div class="comment-body">
            <div class="comment-text">
                <h3>{{ $reviews->userReview->name }}</h3>
                <table>
                    <tr style="padding:5px; font-size:12px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <td>
                                <span class="fa fa-star {{ $reviews->R_Rating >= $i ? 'checked' : '' }}"></span>
                            </td>
                        @endfor
                    </tr>
                </table>

                <p>
                    <span>
                        {{ \Carbon\Carbon::parse($reviews->created_at)->format('d-m-Y') }}
                    </span>
                </p>

                <p>{{ $reviews->R_Comment }}</p>

                @if ($reviews->R_Image)
                    <p><img class="imagereview" src="{{ asset('images/' . $reviews->R_Image) }}"></p>
                @endif
            </div>
        </div>
    @endforeach
</div>

               
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <div class="search-widget">
                            <form>
                                <input class="form-control" type="text" placeholder="Search Keyword">
                                <button class="btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        {{-- MODULE 5 --}}
                        <h2 class="widget-title">You might like this product</h2>
                        <div class="recent-post">
                            @foreach ($products as $product)
                            <div class="row mb-5">
                                <div class="post-item">
                                    <div class="text-center" style="background-color: #ccc">
                                        <a href="/detail/16"><img class="post-img" src="{{ $product->image}}" alt="Product Image"></a>
                                    </div>
                                    <div class="post-text">
                                        <p class="card-title">Similarity: {{ round($product->similarity * 100, 1)
                                            }}%</p>
                                        <p class="card-text text-muted">{{ $product->name }} (RM{{ $product->price
                                            }})</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="sidebar-widget">
                        <div class="image-widget">
                            <a href="#"><img src="asset/img/blog-2.jpg" alt="Image"></a>
                        </div>
                    </div> --}}

                    <div class="sidebar-widget">
                        <h2 class="widget-title">Categories</h2>
                        <div class="category-widget">
                            <ul>
                                <li><a href="">Food</a><span>(98)</span></li>
                                <li><a href="">Drinks</a><span>(87)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- script module 5 --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<!-- Single Post End-->
@endsection