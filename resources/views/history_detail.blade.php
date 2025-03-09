@extends('master')
@section('content')

<!-- Customer Order History Detail Start -->

  <div class="container py-5 h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-8">
        <div class="card" style="border-radius: 10px;">
          <div class="card-header px-4 py-5">
            <h5 class="text-muted mb-0">Order Details by <span style="color: #00224e;">{{$order->O_Name}}</span>!</h5>
          </div>
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0" style="color: #fbaf32;">Product</p>
              <p class="small text-muted mb-0">Order Date: {{$order->created_at}}</p>
            </div>
            <div class="card shadow-0 border mb-4">
              <div class="card-body">
                <div class="row">
                    @foreach ($order->orderitems as $item)
                  <div class="col-md-2">
                    <img src="{{asset('images/'. $item->products->P_Image)}}">
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0">{{$item->products->P_Name}}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">Quantity: {{$item->Order_Quantity}}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">RM{{ number_format((float) $item->Order_Price, 2, '.', '') }}</p>
                  </div>
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small">{{$order->O_Notes}}</p>
                  </div>
                  @if($order->O_Status=='1' && $item-> rstatus== 0)
                  <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                    <p class="text-muted mb-0 small"><a href= "/write-review/{{$item->products->P_Id}}">Write Review</a></p>
                  </div>
                  @endif
                  <!-- sampai sini -->
                    @endforeach
                </div>
                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
              </div>
            </div>

            <div class="d-flex justify-content-between pt-2">
              <p class="fw-bold mb-0">Order Details</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Total:</span> RM{{ number_format((float) $order->O_Total_Price, 2, '.', '') }}</p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Email Address: {{$order->O_Email}}</p>
            </div>

            <div class="d-flex justify-content-between pt-2">
              <p class="text-muted mb-0">Address: {{$order->O_Street_1}} {{$order->O_Postcode}} {{$order->O_City}} {{$order->O_State}}</p>
              <p class="text-muted mb-0"><span class="fw-bold me-4">Discount:</span> RM0.00</p>
            </div>

            <div class="d-flex justify-content-between">
              <p class="text-muted mb-0">Contact No: {{$order->O_Phone}}</p>
            </div>

          </div>
          <div class="card-footer border-0 px-4 py-5" style="background-color: white; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
          @if($order->O_Type=='dineIn')
            Dine In Table: {{$order->T_Id}}
          @elseif($order->O_Type=='pickUp')
            Pickup Time: {{$order->DateTime}}
          @elseif($order->O_Type=='booking')
            Booking Table: {{$order->T_id}}
            Booking Pax: {{$order->T_Pax}}
            Booking Date and Time: {{$order->Datetime}}
          @elseif($order->O_Type=='delivery')
            Delivery Date and Time: {{$order->Datetime}}
          @endif
          </div>
          <div class="card-footer border-0 px-4 py-5" style="background-color: #fbaf32; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total paid: <span class="h2 mb-0 ms-2">RM{{ number_format((float) $order->O_Total_Price, 2, '.', '') }}</span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
