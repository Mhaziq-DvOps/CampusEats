@extends('master')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h3>Checkout Complete</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Status:</strong>
                @if($order->O_Status == 5)
                    <span class="badge bg-success">Picked Up</span>
                @elseif($order->O_Status == 4)
                    <span class="badge bg-warning">Ready for Pickup</span>
                 @elseif($order->O_Status == 3)
                    <span class="badge bg-warning">Ready</span>
               
                   @elseif($order->O_Status == 2)
                    <span class="badge bg-warning">Preparing</span>

                   @elseif($order->O_Status == 1)
                    <span class="badge bg-warning">Order Receive</span>
                    @elseif($order->O_Status == 0)
                    <span class="badge bg-warning">Order Cancelled</span>
                @else
                    <span class="badge bg-secondary">Status {{ $order->O_Status }}</span>
                @endif
            </p>

            <h4 class="mt-4">Order Items</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Subtotal (RM)</th>
                    </tr>
                </thead>
                <tbody>
                        @php $totalPrice = 0; @endphp
                    @foreach($order->orderItems as $item)
                                     @php
                                        $product = $item->products;
                                        $originalPrice = $product->P_Price;
                                        $hasPromotion = $product->promotion_id && $product->P_Disc_Price;
                                        $finalPrice = $hasPromotion ? $product->P_Disc_Price : $originalPrice;
                                        $lineTotal = $finalPrice * $item->Order_Quantity;
                                        $totalPrice += $lineTotal;
                                    @endphp
                        <tr>
                            <td>{{ $item->Order_Quantity }}</td>
                            <td>{{ $item->products->P_Name }}</td>
                            <td>{{ number_format($lineTotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        <h5>Total: RM {{ number_format($totalPrice, 2) }}</h5>
             @if ($order->O_Status == 1)
            <form action="{{ route('order.cancel', ['id' => $order->id]) }}" method="POST" onsubmit="return confirm('Adakah anda pasti ingin batalkan order ini?');">
                @csrf
                <button type="submit" class="btn btn-danger mt-3">Cancel Order</button>
            </form>
            @elseif($order->O_Status == 4)
                <form action="{{ route('order.pickedup', ['id' => $order->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3">Mark as Picked Up</button>
                </form>
            @endif
           
            <a href="{{ url('/') }}" class="btn btn-secondary mt-4">Back to Home</a>
        </div>
    </div>
</div>


<script>
    // Auto-reload the page every 2 minutes (120000 milliseconds)
    //60000 milliseconds = 1 minute
    setInterval(function () {
        location.reload();
    }, 60000); // 1 minutes
</script>


@endsection
