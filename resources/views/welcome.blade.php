@extends('layouts.master')

@section('content')
    {{-- start animals clothes section --}}
    <section id="clothes" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Animals Clothes</h2>
                {{-- filter --}}
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4 active" data-filter="*">ALL</button>
                        @foreach ($animals as $animal)
                            <button class="filter-button me-4 "
                                data-filter=".category{{ $animal->id }}">{{ $animal->name }}</button>
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

            {{-- start containser of cards --}}
            <div class="isotope-container row">
                {{-- start the cards --}}
                @foreach ($clothesproducts as $product)
                    <div class="item category{{ $product->animal->id }} col-md-4 col-lg-3 my-4">
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
                                        Rating: {{ number_format($product->rating, 1) }} -> 5.0</span>

                                    <h3 class="secondary-font text-primary">${{ number_format($product->price, 2) }}</h3>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart btn-add-to-cart me-3 px-4 pt-3 pb-3" data-product-id="{{ $product->id }}">
                                            <h5 class="text-uppercase m-0">Add to Cart</h5>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 btn-wishlist-toggle {{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'text-primary' : '' }}" data-product-id="{{ $product->id }}">
                                            <iconify-icon icon="{{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'fluent:heart-28-filled' : 'fluent:heart-28-regular' }}" class="fs-5"></iconify-icon>
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
    {{-- end animals clothes section --}}



    {{-- start animals food section --}}
    <section id="food" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Animals Food</h2>

                {{-- filter --}}
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4 active" data-filter="*">ALL</button>
                        @foreach ($animals as $animal)
                            <button class="filter-button me-4 "
                                data-filter=".category{{ $animal->id }}">{{ $animal->name }}</button>
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
                @foreach ($foodproducts as $product)
                    <div class="item category{{ $product->animal->id }} col-md-4 col-lg-3 my-4">
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
                                        Rating: {{ number_format($product->rating, 1) }} -> 5.0</span>

                                    <h3 class="secondary-font text-primary">${{ number_format($product->price, 2) }}</h3>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart btn-add-to-cart me-3 px-4 pt-3 pb-3" data-product-id="{{ $product->id }}">
                                            <h5 class="text-uppercase m-0">Add to Cart</h5>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 btn-wishlist-toggle {{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'text-primary' : '' }}" data-product-id="{{ $product->id }}">
                                            <iconify-icon icon="{{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'fluent:heart-28-filled' : 'fluent:heart-28-regular' }}" class="fs-5"></iconify-icon>
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
    {{-- end animals food section --}}



    {{-- start animals supplies section --}}
    <section id="supplies" class="my-5 overflow-hidden">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Animals Supplies</h2>

                {{-- filter --}}
                <div class="mb-4 mb-md-0">
                    <p class="m-0">
                        <button class="filter-button me-4 active" data-filter="*">ALL</button>
                        @foreach ($animals as $animal)
                            <button class="filter-button me-4 "
                                data-filter=".category{{ $animal->id }}">{{ $animal->name }}</button>
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
                @foreach ($suppliesproducts as $product)
                    <div class="item category{{ $product->animal->id }} col-md-4 col-lg-3 my-4">
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
                                        Rating: {{ number_format($product->rating, 1) }} -> 5.0</span>

                                    <h3 class="secondary-font text-primary">${{ number_format($product->price, 2) }}</h3>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart btn-add-to-cart me-3 px-4 pt-3 pb-3" data-product-id="{{ $product->id }}">
                                            <h5 class="text-uppercase m-0">Add to Cart</h5>
                                        </a>
                                        <a href="#" class="btn-wishlist px-4 pt-3 btn-wishlist-toggle {{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'text-primary' : '' }}" data-product-id="{{ $product->id }}">
                                            <iconify-icon icon="{{ Auth::check() && Auth::user()->wishlistProducts->contains($product->id) ? 'fluent:heart-28-filled' : 'fluent:heart-28-regular' }}" class="fs-5"></iconify-icon>
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
    {{-- end animals supplies section --}}



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



    {{-- start best selling  section --}}
    <section id="bestselling" class="my-5 overflow-hidden">
        <div class="container py-5 mb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
                <h2 class="display-3 fw-normal">Best selling products</h2>
                <div>
                    <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                        shop now
                        <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                            <use xlink:href="#arrow-right"></use>
                        </svg></a>
                </div>
            </div>

            <div class=" swiper bestselling-swiper">
                <div class="swiper-wrapper">
                    {{-- start the cards --}}
                    <div class="swiper-slide">
                        <div class="card position-relative">
                            <a href="single-product.html"><img src="{{ asset('assets/images/item5.jpg') }}"
                                    class="img-fluid rounded-4" alt="image"></a>
                            <div class="card-body p-0">
                                <a href="single-product.html">
                                    <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                                </a>

                                <div class="card-text">
                                    <span class="rating secondary-font">
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                        5.0</span>

                                    <h3 class="secondary-font text-primary">$18.00</h3>

                                    <div class="d-flex flex-wrap mt-3">
                                        <a href="#" class="btn-cart btn-add-to-cart me-3 px-4 pt-3 pb-3" data-product-id="{{ $product->id }}">
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
                </div>
            </div>
        </div>
    </section>
    {{-- end best selling  section --}}




    {{-- 
  <section id="register" style="background: url('{{ asset('assets/images/background-img.png') }}') no-repeat;">
    <div class="container ">
      <div class="row my-5 py-5">
        <div class="offset-md-3 col-md-6 my-5 ">
          <h2 class="display-3 fw-normal text-center">Get 20% Off on <span class="text-primary">first Purchase</span>
          </h2>
          <form>
            <div class="mb-3">
              <input type="email" class="form-control form-control-lg" name="email" id="email"
                placeholder="Enter Your Email Address">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg" name="email" id="password1"
                placeholder="Create Password">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-lg" name="email" id="password2"
                placeholder="Repeat Password">
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-dark btn-lg rounded-1">Register it now</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> --}}
@endsection
