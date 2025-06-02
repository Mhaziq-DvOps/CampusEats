@extends('master')
@section('content')

<!-- Page Header Start -->
<div class="page-header mb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Menu</h2>
            </div>
            <div class="col-12">
                <a href="/">Home</a>
                <a href="/catalogue">Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Menu Start -->
<div class="menu">
    <div class="container">
        <div class="section-header text-center">
            <!-- <p>Food Menu</p> -->
            <p></p>
            <p></p>
            <h2>Delicious Food Menu</h2>
        </div>
        <div class="menu-tab product_data">
            
            <ul class="nav nav-pills justify-content-center">
                @foreach ($category as $cate)
                <li class="nav-item">
                    <a href="#category{{$cate->P_Cat_Id}}" class="nav-link active" data-toggle="pill">{{$cate->P_Cat_Name}}</a>
                </li>
                @endforeach
            </ul>
            
            <div class="tab-content">
            @foreach ($category as $P_Cat)
                <div id="category{{$P_Cat->P_Cat_Id}}" class="container tab-pane active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12">


                       @php
                        $catProduct = App\Models\Product::where('Cat_Id',$P_Cat->P_Cat_Id)->orderBy('Cat_Id','DESC')->get();
                        @endphp
                        
                   


                        @foreach ($catProduct as $item)
<div class="item {{$item->P_Id==1 ? 'active' : ''}}">
    <div class="menu-item d-flex flex-wrap">
        <div class="menu-img me-3 mb-3">
            <img src="{{ asset('images/' . $item->P_Image) }}" alt="Image" style="max-width: 150px; border-radius: 10px;">
        </div>
        <div class="menu-text flex-grow-1">
            <h3 class="d-flex justify-content-between align-items-center">
                <a href="detail/{{$item->P_Id}}">{{$item->P_Name}}</a>
                <strong class="text-primary">RM{{ number_format((float) $item->P_Price, 2, '.', '') }}</strong>
            </h3>

            <!-- Status label -->
            <div class="mb-2">
                @if($item->P_Status == 1)
                    <span class="badge bg-success">Available</span>
                @else
                    <span class="badge bg-danger">Unavailable</span>
                @endif
            </div>

            <!-- Description -->
            <p class="text-muted" style="min-height: 40px;">{{$item->S_Description}}</p>
<br>

            <!-- Form + Quantity + Cart -->
            <form action="/add_to_cart" method="POST" class="d-flex align-items-center flex-wrap justify-content-end w-100">
                @csrf
                <input type="hidden" name="Pro_Id" value="{{ $item->P_Id }}">
                <input type="hidden" name="otype" value="{{ $order }}">
                <input type="hidden" name="bookdate" value="{{ $bookdate }}">
                <input type="hidden" name="booktime" value="{{ $booktime }}">
                <input type="hidden" name="booktable" value="{{ $booktable }}">
                
                   {{-- <div class="quantity input-group me-3 mb-2 ms-auto"> --}}
                        <div class="quantity input-group mb-2"> <!-- Removed me-3, added pe-3 -->
    
                    <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm mx-1 changeQuantity" data-field="Pro_qty">
                    <input type="number" step="1" max="10" value="1" name="Pro_qty" class="quantity-field border-0 text-center w-80" style="width: 80px;">
                    <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm mx-1 changeQuantity" data-field="Pro_qty">
                </div>

                @if($item->P_Status == 1)
                    <button class="button-cart addToCartBtn btn btn-sm btn-outline-primary mb-2">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                @else
                    <button disabled class="button-cart btn btn-sm btn-secondary mb-2">
                        <i class="fa fa-shopping-cart"></i> Unavailable
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>
@endforeach
                    </div>



                        {{-- Update New photo 10 May 2025 --}}
                        {{-- <div class="col-lg-5 d-none d-lg-block">
                            <img src="asset/img/menu-friedrice-big.png" alt="Image">
                        </div> --}}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

<!-- offer section -->


<section class="offer_section layout_padding-bottom">
<div class="offer_container">
    <div class="container ">
    <div class="row">
    @foreach ($promotionBanner as $shoppromotion)
        <div class="col-md-6  ">
        <div class="box ">
            <div class="img-box">
            <!-- <img src="asset/img/o1.jpg" alt="Promotion Image"> -->
            <img src="{{asset('images/'. $shoppromotion['Promo_Image'])}}"  alt = "Promotion image" class="promotionimage"/>
            </div>
            <div class="detail-box">
            <h5>
            {{$shoppromotion->Promo_Name}} 
            </h5>
            <h6>
                <span>{{$shoppromotion->Promo_Discount}}%</span> Off
            </h6>
            <a >
                From {{$shoppromotion->Promo_Start}} until {{$shoppromotion->Promo_End}}
                
            </a>
            </div>
        </div>
        </div>
        @endforeach
    </div>
    </div>
</div>
</section>


@endsection


  @section('scripts')
<script>
function incrementValue(e) {
    e.preventDefault();
    var parent = $(e.target).closest('.quantity');
    var input = parent.find('input[name="Pro_qty"]');
    var currentVal = parseInt(input.val(), 10);

    if (!isNaN(currentVal) && currentVal < 10) {
        input.val(currentVal + 1);
    } else {
        input.val(1);
    }
}

function decrementValue(e) {
    e.preventDefault();
    var parent = $(e.target).closest('.quantity');
    var input = parent.find('input[name="Pro_qty"]');
    var currentVal = parseInt(input.val(), 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        input.val(currentVal - 1);
    } else {
        input.val(1);
    }
}

$('.input-group').on('click', '.button-plus', function(e) {
    incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
    decrementValue(e);
});
</script>
@endsection 