@extends('master')

@section('content')
<div class="container mt-5">
    <h3>Your Orders</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total (RM)</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
      
        <tbody>
    @forelse($orders as $order)
        @if($order->O_Status != 5) {{-- Skip orders that are picked up --}}
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ number_format($order->O_Total_Price, 2) }}</td>
            <td>
                @if($order->O_Status == 0)
                    <span class="badge bg-danger">Cancelled</span>
                @elseif($order->O_Status == 1)
                    <span class="badge bg-warning">Order Received</span>
                @elseif($order->O_Status == 2)
                    <span class="badge bg-warning">Preparing</span>
                @elseif($order->O_Status == 3)
                    <span class="badge bg-warning">Ready</span>
                @elseif($order->O_Status == 4)
                    <span class="badge bg-warning">Ready for Pickup</span>
                @else
                    <span class="badge bg-secondary">Unknown</span>
                @endif
            </td>
            <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
            <td>
                <a href="{{ route('checkout_complete', parameters: ['orderId' => $order->id]) }}" class="btn btn-sm btn-primary">Track</a>
            </td>
        </tr>
        @endif
    @empty
    <tr>
        <td colspan="5">You have no orders yet.</td>
    </tr>
    @endforelse
</tbody>




    </table>
</div>

<script>
    // Auto-reload the page every 2 minutes (120000 milliseconds)
    //60000 milliseconds = 1 minute
    setInterval(function () {
        location.reload();
    }, 60000); // 1 minutes
</script>

@endsection
