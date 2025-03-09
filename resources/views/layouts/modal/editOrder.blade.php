<!-- Modal -->


<div class="modal fade" id="editModal{{ $Order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order {{ $Order->Tracking_No }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('order.update', $Order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <h4 class="header-title">Order Details</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-light">
                                    <tr class>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                @foreach ($Order->orderitems as $OrderProduct)
                                    <tbody>
                                        <tr>
                                            <td>{{ $OrderProduct->items->P_Name }}</td>
                                            <td>{{ $OrderProduct->Order_Quantity }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                
                                <input type="hidden" value="{{ $Order->O_Status + 1 }}" name="O_Status">
                                <input type="hidden" value="{{ $Order->O_Status + 1 }}" name="O_Status">
                            </table>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Notes:</label>
                                <input class="form-control" type="text"
                                    value="{{ $Order->O_Notes }}" id="example-text-input" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    @if ($Order->O_Status == '1')
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#rejectModal{{ $Order->id }}">Reject</button>
                        <input type="hidden" value="0" name="ML_Type">
                        <input type="hidden" value="PREPARING" name="ML_Status">
                        <button type="submit" class="btn btn-success">Accept</button>
                    @elseif ($Order->O_Status == '2')
                        <input type="hidden" value="COMPLETED" name="ML_Status">
                        <button type="submit" class="btn btn-success">Order Complete</button>
                    @else
                        <form action="{{ route('order.destroy', $Order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Remove Order</button>
                        </form>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.modal.rejectOrder')

<!--endModal-->
