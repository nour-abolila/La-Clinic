@extends('layouts.master')

@section('content')
<section class="py-5 bg-light" style="min-height: 80vh;">
    <div class="container py-5">
        <h2 class="display-5 fw-normal mb-4">Shopping Cart</h2>
        
        <div class="row" id="cart-page-content">
            @if($cartItems->isEmpty())
                <div class="col-12 text-center py-5 bg-white rounded shadow-sm">
                    <iconify-icon icon="mdi:cart-outline" class="display-1 text-muted mb-3" style="font-size: 8rem;"></iconify-icon>
                    <h3>Your cart is empty</h3>
                    <p class="text-muted">Looks like you haven't added anything to your cart yet.</p>
                    <a href="/" class="btn btn-primary mt-3 px-4 py-2">Start Shopping</a>
                </div>
            @else
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col" class="border-0 ps-4 py-3">Product</th>
                                            <th scope="col" class="border-0 py-3">Price</th>
                                            <th scope="col" class="border-0 py-3 text-center">Quantity</th>
                                            <th scope="col" class="border-0 py-3 text-end">Subtotal</th>
                                            <th scope="col" class="border-0 pe-4 py-3 text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                        <tr data-cart-id="{{ $item->id }}">
                                            <td class="ps-4 py-3">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/images/item1.jpg') }}" alt="{{ $item->product->name }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                        <small class="text-muted">{{ $item->product->category->name ?? 'Category' }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 fw-medium">${{ number_format($item->product->price, 2) }}</td>
                                            <td class="py-3 text-center">
                                                <div class="d-inline-flex align-items-center border rounded p-1">
                                                    <button class="btn btn-sm btn-light px-2 py-0 border-0 update-cart-qty" data-cart-id="{{ $item->id }}" data-action="minus">-</button>
                                                    <input type="number" class="form-control form-control-sm text-center border-0 cart-qty-input px-1" value="{{ $item->quantity }}" min="1" style="width: 45px; -moz-appearance: textfield;">
                                                    <button class="btn btn-sm btn-light px-2 py-0 border-0 update-cart-qty" data-cart-id="{{ $item->id }}" data-action="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="py-3 text-end fw-bold item-subtotal" data-cart-id="{{ $item->id }}">
                                                ${{ number_format($item->product->price * $item->quantity, 2) }}
                                            </td>
                                            <td class="pe-4 py-3 text-end">
                                                <button class="btn btn-sm btn-outline-danger border-0 remove-from-cart" data-cart-id="{{ $item->id }}">
                                                    <iconify-icon icon="mdi:trash" class="fs-5"></iconify-icon>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-light border-0 py-3">
                            <h5 class="mb-0 fw-bold">Order Summary</h5>
                        </div>
                        <div class="card-body py-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-medium cart-page-total">${{ number_format($cartTotal, 2) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Shipping</span>
                                <span class="fw-medium text-success">Free</span>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold fs-5">Total</span>
                                <span class="fw-bold fs-5 text-primary cart-page-total">${{ number_format($cartTotal, 2) }}</span>
                            </div>
                            <button class="btn btn-primary w-100 py-3 fw-bold text-uppercase">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>
@endsection
