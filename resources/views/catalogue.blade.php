@extends('master')
@section('content')
<head>
    <!-- Bootstrap Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
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

<!-- offer section -->



<section class="offer_section layout_padding-bottom bg-light py-5">
  <div class="container">
    <div class="row g-4 justify-content-center">

      @php $now = now(); @endphp

      @foreach ($promotionBanner as $shoppromotion)
        @if ($shoppromotion->Promo_Status === 'Ongoing' && $now->between($shoppromotion->Promo_Start, $shoppromotion->Promo_End))
          <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
              <div class="position-relative">
                <img src="{{ asset('images/' . $shoppromotion['Promo_Image']) }}" class="card-img-top img-fluid rounded-top" alt="Promotion image">

              </div>
              <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title text-primary">{{ $shoppromotion->Promo_Name }}</h5>
                <h6 class="text-success">{{ $shoppromotion->Promo_Discount }}% Off</h6>
                <p class="card-text text-muted mt-auto mb-0">
                  From {{ \Carbon\Carbon::parse($shoppromotion->Promo_Start)->format('d M Y') }} to {{ \Carbon\Carbon::parse($shoppromotion->Promo_End)->format('d M Y') }}
                </p>
              </div>
                <section class="position-relative">
        <span class="badge bg-danger position-absolute top-0 start-0 m-3 fs-6 fw-bold" style="animation: pulse 1.5s infinite;">
            🔥 Now On Promotion!
        </span>
            </div>
          </div>
        @endif
      @endforeach

    </div>
  </div>
</section>

<style>
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }
</style>





    </div>
    </div>
</div>
</section>
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
                        <div class="col-lg-10 col-md-12">


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
                {{-- <strong class="text-primary">RM{{ number_format((float) $item->P_Price, 2, '.', '') }}</strong> --}}
                

                @if($item->P_Disc_Price && $item->P_Disc_Price < $item->P_Price)
    <span style="text-decoration: line-through; color: red;">
        Before Promo RM{{ number_format($item->P_Price, 2) }}
            </span>
            <strong class="text-success">After Promo RM{{ number_format($item->P_Disc_Price, 2) }}</strong>
        @else
            <strong class="text-primary">RM{{ number_format($item->P_Price, 2) }}</strong>
@endif

           
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
                

                <div class="d-flex justify-content-end align-items-center mb-2">
<div class="input-group quantity" style="margin-right: 40px;">
                    <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm me-1 changeQuantity" data-field="Pro_qty">

                    <input type="number" step="1" max="10" value="1" name="Pro_qty"
                        class="quantity-field border-0 text-center" style="width: 80px;">

                    <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm ms-1 changeQuantity" data-field="Pro_qty">
                </div>
            </div>


                @if($item->P_Status == 1)
                    <button class="button-cart addToCartBtn btn btn-sm btn-outline-primary">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                @else
                    <button disabled class="button-cart btn btn-sm btn-secondary">
                        <i class="fa fa-shopping-cart"></i> Unavailable
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>
@endforeach
                    </div>

                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


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

    
    <script>
    // Auto-reload the page every 2 minutes (120000 milliseconds)
    //60000 milliseconds = 1 minute
    setInterval(function () {
        location.reload();
    }, 60000); // 1 minutes
</script>
@endsection 