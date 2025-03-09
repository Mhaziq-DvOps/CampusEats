<!-- Modal -->
<div class="modal fade" id="rejectModal{{ $Order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason to Reject</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('order.update', $Order->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" rows="4"
                            cols="50" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('order.destroy', $Order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-success">Send</button>
                        </form>
                </div>
            </form>
        </div>
    </div>
</div>

<!--endModal-->
