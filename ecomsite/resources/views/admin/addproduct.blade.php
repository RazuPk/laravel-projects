@extends('admin.layouts.template')
@section('page-title')
    Add Product | EcomSite
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h5>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
                    <small class="text-muted float-end">Input Information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_name" id="product_name"
                                    placeholder="Product Name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="price">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="100" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="quantity">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="quantity" id="quantity"
                                    placeholder="10" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_short_des">Short Description</label>
                            <div class="col-sm-10">
                                <textarea rows="1" class="form-control" name="product_short_des" id="product_short_des"
                                    placeholder="Product short description..."></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_long_des">Long Description</label>
                            <div class="col-sm-10">
                                <textarea rows="2" class="form-control" name="product_long_des" id="product_long_des"
                                    placeholder="Product long description..."></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="category_id">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="category_id" name="category_id"
                                    onchange="fetchSubCategory(this.value)">
                                    <option selected>Open this select menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subcategory_id">Sub Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="subcategory_id" name="subcategory_id">

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_img">Product Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="product_img" name="product_img" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script>
        function fetchSubCategory(obj) {
            let id = obj;
            if (id) {
                var url = "{{ route('fetchsubcategory', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var choose = '<option selected>Open this select menu</option>';
                        $('#subcategory_id').html(choose + data);
                    }
                })
            } else {
                $('#subcategory_id').html('<option selected>Open this select menu</option>');
            }
        }
    </script>
@endsection
@endsection
