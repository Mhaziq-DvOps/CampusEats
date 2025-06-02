@include('include.header')

<div class="page-container">
    @include('include.sidebar')

    <div class="main-content">
        @include('include.header_area')

        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                    </div>
                </div>
                @include('include.managerBar')
            </div>
        </div>

        <div class="main-content-inner">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('catalogues.update', $product->P_Id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <h4 class="header-title">Edit Product</h4>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Product Name:</label>
                                        <input type="text" class="form-control" name="P_Name" value="{{ $product->P_Name }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Short Description</label>
                                    <input type="text" class="form-control" name="S_Description" value="{{ $product->S_Description }}">
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea class="form-control" name="L_Description" rows="4">{{ $product->L_Description }}</textarea>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Price:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>
                                            <input type="text" class="form-control" id="P_Price" name="P_Price" value="{{ $product->P_Price }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Apply Promotion:</label>
                                        <select class="form-control" id="promotionSelect" name="promotion_id">
                                            <option value="">-- No Promotion --</option>
                                            @foreach($promotion as $promo)
                                                <option value="{{ $promo->Promotion_Id }}"
                                                    data-discount="{{ $promo->Promo_Discount }}"
                                                    {{ $product->promotion_id == $promo->Promotion_Id ? 'selected' : '' }}>
                                                    {{ $promo->Promo_Name }} ({{ $promo->Promo_Discount }}%)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Discount Price:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>
                                            <input type="text" class="form-control" id="discPrice" name="P_Disc_Price"
                                                value="{{ $product->P_Disc_Price }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Duration:</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="P_Duration" value="{{ $product->P_Duration }}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Minutes</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Quantity (optional):</label>
                                        <input type="text" class="form-control" name="P_Quantity" value="{{ $product->P_Quantity }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Availability:</label><br>
                                    <label class="switch">
                                        <input type="hidden" value="0" name="P_Status">
                                        <input type="checkbox" name="P_Status" value="1" {{ $product->P_Status == 1 ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <label>Image:</label><br>
                                <div class="mb-3">
                                    @if ($product->P_Image)
                                        <img src="{{ asset('images/' . $product->P_Image) }}" width="200" height="200" alt="Product image">
                                    @endif
                                </div>
                                <input type="file" name="P_Image"><br>

                                <div class="form-group mt-3">
                                    <label>Category:</label>
                                    <select class="form-control" name="Cat_Id" style="height:50px">
                                        <option value="{{ $product->category->P_Cat_Id }}">
                                            {{ $product->category->P_Cat_Name }}
                                        </option>
                                        @foreach ($categories as $product_category)
                                            <option value="{{ $product_category->P_Cat_Id }}">
                                                {{ $product_category->P_Cat_Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success" style="float: right; margin-left: 10px;">Save</button>
                                    <a class="btn btn-danger" href="{{ route('catalogues.index') }}" style="float: right;">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        @include('include.footer')
    </footer>
</div>

<!-- JavaScript to calculate discount -->
<script>
    function updateDiscountPrice() {
        const promoSelect = document.getElementById('promotionSelect');
        const selectedOption = promoSelect.options[promoSelect.selectedIndex];
        const discountPercent = parseFloat(selectedOption.getAttribute('data-discount'));
        const priceInput = document.getElementById('P_Price');
        const price = parseFloat(priceInput.value);
        const discInput = document.getElementById('discPrice');

        if (!isNaN(price) && !isNaN(discountPercent)) {
            const discountedPrice = (price - (price * (discountPercent / 100))).toFixed(2);
            discInput.value = discountedPrice;
        } else {
            discInput.value = "";
        }
    }

    document.getElementById('promotionSelect').addEventListener('change', updateDiscountPrice);
    document.getElementById('P_Price').addEventListener('input', updateDiscountPrice);
    window.addEventListener('load', updateDiscountPrice);
</script>
