@if($cartItems->isEmpty())
    <div class="text-center py-5">
        <iconify-icon icon="mdi:cart-outline" class="fs-1 text-muted"></iconify-icon>
        <p class="mt-3">Your cart is empty.</p>
        <a href="/" class="btn btn-outline-primary" data-bs-dismiss="offcanvas">Continue Shopping</a>
    </div>
@else
    <ul class="list-group mb-3">
        @foreach($cartItems as $item)
        <li class="list-group-item d-flex justify-content-between lh-sm align-items-center">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/item1.jpg') }}" alt="{{ $item->product->name }}" style="width: 50px; height: 50px; object-fit: cover;" class="rounded me-3">
                <div>
                    <h6 class="my-0 text-truncate" style="max-width: 150px;">{{ $item->product->name }}</h6>
                    <small class="text-body-secondary">${{ number_format($item->product->price, 2) }} x {{ $item->quantity }}</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="text-body-secondary fw-bold">${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                <button type="button" class="btn btn-sm btn-outline-danger remove-from-cart border-0" data-cart-id="{{ $item->id }}">
                    <iconify-icon icon="mdi:trash"></iconify-icon>
                </button>
            </div>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between bg-light">
            <span class="fw-bold">Total (USD)</span>
            <strong id="offcanvas-cart-total">${{ number_format($cartTotal, 2) }}</strong>
        </li>
    </ul>
    <a href="{{ route('cart.index') }}" class="w-100 btn btn-primary btn-lg">View Cart & Checkout</a>
@endif
