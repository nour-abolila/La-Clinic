@extends('layouts.master')

@section('content')
    {{-- start dogs products section --}}
    <section id="products" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Dog Products</h2>

                {{-- filter --}}
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4 active" data-filter="*">ALL</button>
                        @foreach ($categories as $category)
                            <button class="filter-button me-4 "
                                data-filter=".category{{ $category->id }}">{{ $category->name }}</button>
                        @endforeach
                    </p>
                </div>
                {{-- end filter --}}

                <div>
                    <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg></a>
                </div>
            </div>

            <div class="isotope-container row">
                {{-- start the cards --}}
                @foreach ($dogproducts as $product)
                    <div class="item category{{ $product->category->id }} col-md-4 col-lg-3 my-4">
                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                            New
                        </div>
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="{{ asset('assets/images/item1.jpg') }}"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h3 class="card-title pt-4 m-0">{{ $product->name }}</h3>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        {{-- <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon> --}}
                                        Rating: {{ number_format($product->rating, 1) }}-> 5.0</span>

                                    <h3 class="secondary-font text-primary">${{ number_format($product->price, 2) }}</h3>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                            <h5 class="text-uppercase m-0">Add to Cart</h5>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 ">
                                            <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- end dogs products section --}}



    {{-- start design section --}}
    <section id="banner-2" class="my-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="row flex-row-reverse banner-content align-items-center">
                <div class="img-wrapper col-12 col-md-6">
                    <img src="{{ asset('assets/images/banner-img2.png') }}" class="img-fluid">
                </div>
                <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
                    <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Upto 40% off</div>
                    <h2 class="banner-title display-1 fw-normal">Clearance sale !!!
                    </h2>
                    <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg></a>
                </div>
            </div>
        </div>
    </section>
    {{-- end design section --}}
@endsection
