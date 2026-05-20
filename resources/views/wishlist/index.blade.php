@extends('layouts.master')

@section('content')
    <section id="wishlist" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">My Wishlist</h2>
            </div>

            <div class="row">
                @if ($wishlistProducts->isEmpty())
                    <div class="col-12 text-center py-5">
                        <iconify-icon icon="mdi:heart-off" class="display-1 text-muted mb-3"></iconify-icon>
                        <h3 class="text-muted">Your wishlist is empty</h3>
                        <p>Browse our products and add your favorites here!</p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Shop</a>
                    </div>
                @else
                    @foreach ($wishlistProducts as $product)
                        <div class="item col-md-4 col-lg-3 my-4">
                            <div class="card position-relative">
                                <a href="single-product.html">
                                    <img src="{{ asset('assets/images/item1.jpg') }}" class="img-fluid rounded-4" alt="image">
                                </a>
                                <div class="card-body p-0">
                                    <a href="single-product.html">
                                        <h3 class="card-title pt-4 m-0">{{ $product->name }}</h3>
                                    </a>

                                    <div class="card-text">
                                        <span class="rating secondary-font">
                                            Rating: {{ number_format($product->rating, 1) }} -> 5.0
                                        </span>

                                        <h3 class="secondary-font text-primary">${{ number_format($product->price, 2) }}</h3>

                                        <div class="d-flex flex-wrap mt-3">
                                            <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                                <h5 class="text-uppercase m-0">Add to Cart</h5>
                                            </a>
                                            <a href="#" class="btn-wishlist px-4 pt-3 btn-wishlist-toggle text-primary" data-product-id="{{ $product->id }}">
                                                <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
