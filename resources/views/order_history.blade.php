@extends('master')
@section('content')

<!-- Customer Order History Start -->
<div class="container bootdey">
    <div class="panel panel-default panel-order">
        <div class="panel-heading">
            <strong>Order History</strong>
            <div class="btn-group pull-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Filter history <i class="fa fa-filter"></i>
                    </button>
<ul class="dropdown-menu dropdown-menu-right">
    <li><a href="{{ route('order.history', ['filter' => 'approved']) }}">Approved orders</a></li>
    <li><a href="{{ route('order.history', ['filter' => 'pending']) }}">Pending orders</a></li>
</ul>

                </div>
            </div>
        </div>

        <div class="panel-body">
            @foreach($order as $item)
                <div class="row mb-3 pb-3 border-bottom">
                    <div class="col-md-1 text-center">
                        <a href="history_detail/{{$item->id}}">
                            <strong>{{$item->Tracking_No}}</strong>
                        </a>
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <a href="{{ url('invoice-order/' . $item->id) }}">
                                        <label class="label label-warning">Print Invoice</label>
                                    </a>
                                </div>

                                {{-- Status Labels --}}
                                <div class="pull-right mr-2">
                                    @if($item->O_Status == 5)
                                        <label class="label label-success">Picked Up</label>
                                    @elseif($item->O_Status == 4)
                                        <label class="label label-success">Completed</label>
                                    @elseif($item->O_Status == 0)
                                        <label class="label label-danger">Canceled</label>
                                    @else
                                        <label class="label label-info">In Progress</label>
                                    @endif
                                </div>

                                <div>Total Price: RM{{ number_format((float) $item->O_Total_Price, 2, '.', '') }}</div>
                                <div>Order made on: {{$item->created_at}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
