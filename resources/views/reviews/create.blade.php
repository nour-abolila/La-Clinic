@extends('layouts.master')

@section('content')
    {{-- start add review section --}}
    <section id="add-review" class="my-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    {{-- Section Header --}}
                    <div class="text-center mb-5">
                        <h2 class="display-4 fw-normal">Add Your Review</h2>
                        <p class="text-muted fs-5">We'd love to hear your feedback about our products and services!</p>
                    </div>

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <iconify-icon icon="mdi:check-circle" class="fs-4 me-2"></iconify-icon>
                            <div>{{ session('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><iconify-icon icon="mdi:alert-circle" class="me-1"></iconify-icon>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Review Form Card --}}
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="background: #fefefe;">
                        <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm">
                            @csrf

                            {{-- User Name (auto-filled) --}}
                            <div class="mb-4">
                                <label for="userName" class="form-label fw-semibold">
                                    <iconify-icon icon="mdi:account" class="me-1 text-primary"></iconify-icon>
                                    Your Name
                                </label>
                                <input
                                    type="text"
                                    id="userName"
                                    class="form-control form-control-lg border-dark-subtle rounded-3"
                                    value="{{ Auth::user()->name }}"
                                    disabled
                                    style="background-color: #f8f9fa;"
                                >
                                <small class="text-muted">Name is taken from your account automatically.</small>
                            </div>

                            {{-- Review Text --}}
                            <div class="mb-4">
                                <label for="reviewText" class="form-label fw-semibold">
                                    <iconify-icon icon="mdi:comment-text" class="me-1 text-primary"></iconify-icon>
                                    Your Review
                                </label>
                                <textarea
                                    name="review_text"
                                    id="reviewText"
                                    class="form-control form-control-lg border-dark-subtle rounded-3 @error('review_text') is-invalid @enderror"
                                    rows="6"
                                    placeholder="Share your experience with us..."
                                    maxlength="1000"
                                >{{ old('review_text') }}</textarea>
                                @error('review_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text text-end">
                                    <span id="charCount">0</span> / 1000 characters
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg text-uppercase fs-6 rounded-3 py-3">
                                    <iconify-icon icon="mdi:send" class="me-2"></iconify-icon>
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- end add review section --}}

    {{-- Character counter script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const textarea = document.getElementById('reviewText');
            const counter = document.getElementById('charCount');

            if (textarea && counter) {
                // Set initial count
                counter.textContent = textarea.value.length;

                textarea.addEventListener('input', function () {
                    counter.textContent = this.value.length;
                });
            }
        });
    </script>
@endsection
