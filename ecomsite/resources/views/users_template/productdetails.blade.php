@extends('users_template.layouts.template')
@section('page-title')
    Product Details | EcomSite
@endsection
@section('banner-slider')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                    <div class="tshirt_img">
                        <img src="{{ asset($products->product_img) }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8">
                <div class="box_main">
                    <div class="product-info">
                        <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                        <p class="price_text text-left">Price <span style="color: #262626;">$ {{ $products->price }}</span>
                        </p>
                    </div>
                    <div class="my-3 product-details">
                        <p class="lead">{{ $products->product_long_des }}</p>
                        <ul class="bg-dark text-light p-3 m-2">
                            <li>Category- {{ $products->category_name }}</li>
                            <li>Sub Category- {{ $products->subcategory_name }}</li>
                            <li>Available Quantity- ({{ $products->quantity }})</li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{ route('addtocart') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $products->id }}" name="product_id">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" min="1" value="1">
                            <br>
                            <input class="btn btn-warning" type="submit" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Related Products</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    @foreach ($relatedproducts as $product)
                                    @endforeach
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $product->price }}</span></p>
                                            <div class="tshirt_img"><img src="{{ asset($product->product_img) }}">
                                            </div>
                                            <div class="btn_main">
                                                <div class="buy_bt">
                                                    <form action="{{ route('addtocart') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                        <input type="hidden" name="quantity" min="1" value="1">
                                                        <input class="btn bg-transparent text-warning" type="submit" value="Buy Now">
                                                    </form>
                                                </div>
                                                <div class="seemore_bt">
                                                    <a
                                                        href="{{ route('productdetails', [$product->id, $product->slug]) }}">See
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
