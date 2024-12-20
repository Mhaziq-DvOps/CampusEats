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
                            <div class="item {{$item->P_Id==1?'active':''}}">
                                <div class="menu-item">
                                    <div class="menu-img">
                                        <img src="{{asset('images/'. $item->P_Image)}}" alt="Image">
                                    </div>
                                    <div class="menu-text">
                                        <h3><span><a href="detail/{{$item->P_Id}}">{{$item->P_Name}}</a></span> <strong>RM{{ number_format((float) $item->P_Price, 2, '.', '') }}</strong></h3>
                                        <br>
                                        <p>{{$item->S_Description}}</p>
                                        @if($item->P_Status == 1)
                                            <label class="badge bg-success">In Stock</label>
                                        @else
                                            <label class="badge bg-danger">Out of Stock</label>
                                        @endif
                                    </div>
                                    @if($item->P_Status == 1)
                                        <div class="menu-cart">
                                            <form action="/add_to_cart" method="POST">
                                                @csrf
                                                <input type="hidden" name="Pro_Id" value="{{$item->P_Id}}">
                                                <input type="hidden" id="otype" name="otype" value="{{$order}}">
                                                <input type="hidden" id="bookdate" name="bookdate" value="{{$bookdate}}">
                                                <input type="hidden" id="booktime" name="booktime" value="{{$booktime}}">
                                                <input type="hidden" id="booktable" name="booktable" value="{{$booktable}}"> 
                                                <button class="button-cart addToCartBtn"><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                    @else
                                        <div class="menu-cart">
                                            <input type="hidden" name="Pro_Id" value="{{$item->P_Id}}">
                                            <button disabled class="button-cart addToCartBtn"><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                    @endif
                                    <div class="col-lg-2">
                                        <input type="hidden" value="{{$item->P_Id}}" class="Pro_Id">
                                        <div class="quantity input-group">
                                            <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm mx-1 changeQuantity" data-field="quantity">
                                            <input type="number" step="1" max="10" value="1"  name="Pro_qty" class="quantity-field border-0 text-center w-80" style="width:100px">
                                            <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm changeQuantity" data-field="quantity">
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="asset/img/menu-friedrice-big.png" alt="Image">
                        </div>
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
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal< 10) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(1);
        }
    }

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(1);
    }
}

$('.input-group').on('click', '.button-plus', function(e) {
    incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
    decrementValue(e);
});

$('.changeQuantity').click(function (e){
    e.preventDefault();
    
});

</script>
@endsection



