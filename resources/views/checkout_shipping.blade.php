@extends('master')
@section('content')

<script src="https://js.stripe.com/v3/"></script>

<?php
require_once __DIR__.'/../../../vendor/autoload.php';
?>

<div class="checkout">
    <div class="container">
        <div class="section-header text-center">
            <h2>Checkout Item</h2>
        </div>
        <div class="process-checkout">
            <ul class="progressbar">
                <li class="active">Login</li>
                <li>Customer Details and Billing</li>
                <li>Checkout Complete</li>
                <li>Order Status</li>
            </ul>
        </div>
        <form action="/orderplace" method="POST">
            @csrf
            <div class="shipping-address mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Quantity</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Original Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach($cartitems as $item)
                                        @php
                                            $product = $item->products;
                                            $originalPrice = $product->P_Price;
                                            $discount = $item->promotion_id && $item->P_Disc_Price ?? 0;
                                            $finalPrice = $discount > 0
                                                ? round($originalPrice * (1 - $discount / 100), 2)
                                                : $originalPrice;
                                            $lineTotal = $finalPrice * $item->Pro_Qty;
                                            $totalPrice += $lineTotal;
                                        @endphp
                                        <tr>
                                            <td>{{ $item->Pro_Qty }}</td>
                                            <td>{{ $product->P_Name }}</td>
                                            <td>RM{{ number_format($lineTotal, 2, '.', '') }}</td>
                                        </tr>
                                    @endforeach --}}

                                  @php $totalPrice = 0;
                                      $totalOriginalPrice = 0; // New variable to store total price without discount
                                 @endphp

                                @foreach($cartitems as $item)
                                    @php
                                        $product = $item->products;
                                        $originalPrice = $product->P_Price;
                                        $hasPromotion = $product->promotion_id && $product->P_Disc_Price;
                                        $finalPrice = $hasPromotion ? $product->P_Disc_Price : $originalPrice;
                                        $lineTotal = $finalPrice * $item->Pro_Qty;
                                        $totalPrice += $lineTotal;

                                        // Always use original price for this total
                                        $totalOriginalPrice += $originalPrice * $item->Pro_Qty;
                                    @endphp
                                    <tr>
                                        <td>{{ $item->Pro_Qty }}</td>
                                        <td>{{ $product->P_Name }}</td>
                                        <td>
                                            @if($hasPromotion)
                                                <span style="text-decoration: line-through; color: red;">RM{{ number_format($originalPrice, 2) }}</span><br>
                                                <strong style="color: green;">RM{{ number_format($finalPrice, 2) }}</strong>
                                            @else
                                                RM{{ number_format($finalPrice, 2) }}
                                            @endif
                                        </td>
                                        <td>RM {{number_format($product->P_Price* $item->Pro_Qty,2)}}</td>
                                    </tr>
                                @endforeach

                                <!-- Total Price Row -->
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>RM{{ number_format($totalPrice, 2) }}</strong></td>
                                </tr>
          

                                 

                                </tbody>
                            </table>

                            {{-- <p>Order Type: {{ $oType }}</p> --}}

                            Notes: <input type="text" class="form-control notes" value="{{ $notes }}" name="O_Notes" placeholder="Enter Notes">
                            <label for="reject">If product not available:</label>
                            <select name="Remarks">
                                <option value="Call me if product is not available">Call me</option>
                                <option value="Remove all product">Remove all product</option>
                            </select><br>
                            {{-- <h5>Total Price: RM {{number_format($product->P_Price* $item->Pro_Qty,2)}}</h5> --}}
                            <h5>Total Price before: RM {{number_format($totalOriginalPrice,2)}}</h5>

                            <h5>Total Price After Discount: RM{{ number_format($totalPrice, 2, '.', '') }}</h5>
                             <h5> You have saved RM{{ number_format($totalOriginalPrice - $totalPrice, 2) }} </h5>

                        </div>
                    </div>
                </div>

                {{-- Customer Details --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Customer Details</h4>
                        </div>
                    </div>
                    <div class="address-item">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" class="form-control cname" value="{{ Auth::user()->name }}" name="O_Name" placeholder="Enter Name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="text" class="form-control cemail" value="{{ Auth::user()->email }}" name="O_Email" placeholder="Enter Email" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control cphone" value="{{ Auth::user()->phone }}" name="O_Phone" placeholder="Enter Phone Number" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Street No</label>
                                <input type="text" class="form-control cstreet" value="{{ Auth::user()->street_1 }}" name="O_Street_1" placeholder="Enter Street" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Postcode</label>
                                <input type="text" class="form-control cpostcode" value="{{ Auth::user()->postcode }}" name="O_Postcode" placeholder="Enter Postcode" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control ccity" value="{{ Auth::user()->city }}" name="O_City" placeholder="Enter City" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control cstate" value="{{ Auth::user()->state }}" name="O_State" placeholder="Enter State" required="required">
                            </div>

                            <input type="hidden" name="Log_Module" value="Payment">
                            <input type="hidden" name="Log_Status" value="COMPLETED">
                            <input type="hidden" name="Cust_Id" value="{{ Auth::user()->id }}">
                        </form>
                    </div>
                </div>

                {{-- Payment --}}
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>Payment Options</h4>
                            <hr>
                            {{-- {{-- <div class="payment-option"> --}}
                                <div class="payment-option">
                                @if($cashEnabled)
                                    <button type="submit" name="payment" value="Cash" class="btn btn-success w-100 mt-3">Pay with Cash</button>
                                @else
                                    <button type="button" class="btn btn-secondary w-100 mt-3" disabled>Pay with Cash (Disabled)</button>
                                @endif

                                {{-- <button type="submit" name="payment" value="Cash" class="btn btn-success w-100 mt-3">Pay with Cash</button> --}}

                                {{-- @if(\Session::has('success'))
                                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                    {{ \Session::forget('success') }}
                                @endif

                                <button id="stripe-checkout" name="payment" value="Stripe" class="btn btn-success w-100 mt-3" style="background-color: black">Pay with Stripe</button>
                                 --}}

                                 @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                {{ Session::forget('success') }}
                            @endif

                            @if($stripeEnabled)
                                <button id="stripe-checkout" name="payment" value="Stripe" class="btn btn-success w-100 mt-3" style="background-color: black">
                                    Pay with Stripe
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary w-100 mt-3" disabled>
                                    Pay with Stripe (Disabled)
                                </button>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
\Stripe\Stripe::setApiKey('sk_test_51Q7u8j2L1aVEtKIRHG670oCl9ogBxkSVcURtf2w8T2eStpIdPmKFrFGgV2GQwgIM09NILPLMs3xgmdJCe56nAcxJ00PjNu8Gz9');

$session = \Stripe\Checkout\Session::create([
    'line_items' => [[
        'price_data' => [
            'currency' => 'myr',
            'product_data' => [
                'name' => 'Total Order',
            ],
            'unit_amount' => intval($totalPrice * 100),
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://127.0.0.1:8000/checkout_summary',
    'cancel_url' => 'https://example.com/cancel',
]);
?>

@endsection

@section('scripts')
<script>
   const stripe = Stripe('pk_test_51Q7u8j2L1aVEtKIRAE0zyXAqi8nZNX6M5UOrnrDiy10jKnAVJuwvsZmi2kkoQB5xPCd8AlGPmz7i2cJuJyQ17Ybi00FTMzZOFw');
   const btn = document.getElementById("stripe-checkout");
   btn.addEventListener('click', function(e){
       e.preventDefault();
       stripe.redirectToCheckout({
           sessionId: "<?php echo $session->id ?>"
       });
   });
</script>
@endsection
