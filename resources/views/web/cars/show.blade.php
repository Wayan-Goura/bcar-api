@extends('layouts.app')

@section('content')
<style>
    .booking-card {
        border-radius: 25px;
        background: #ffffff;
        border: 1px solid #f1f5f9;
    }
    .form-label { font-size: 0.85rem; color: #64748b; margin-bottom: 5px; }
    .form-control {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
    }
    .form-control:focus {
        background: #fff;
        border-color: #FFC107;
        box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.1);
    }
    .btn-submit {
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        transition: 0.3s;
    }
</style>

<div class="container my-5">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold m-0">Book Car: <span class="text-primary">{{ $car->name }}</span></h3>
            <p class="text-muted mb-0 small">Lengkapi data untuk reservasi armada Anda</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-light rounded-pill px-4">← Back</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 p-3">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="card booking-card shadow-lg border-0">
        <div class="card-body p-lg-5 p-4">
            <form action="{{ route('book.car') }}" method="POST">
                @csrf
                <input type="hidden" name="car_name" value="{{ $car->name }}">

                <div class="row g-4">
                    {{-- NAME --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Full Name</label>
                        <input name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                    </div>

                    {{-- PHONE --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Phone / WhatsApp</label>
                        <input name="phone" class="form-control" placeholder="+62..." required>
                    </div>

                    {{-- COUNTRY --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Country</label>
                        <input name="country" class="form-control" placeholder="Your Country">
                    </div>

                    {{-- PASSENGER --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Number of Passengers</label>
                        <input type="number" name="passenger" min="1" max="{{ $car->max_passenger }}" class="form-control" required>
                    </div>

                    {{-- DATE --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>

                    {{-- DURATION --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Rental Duration (Days)</label>
                        <input type="number" name="rental_duration" min="1" class="form-control" value="1" required>
                    </div>

                    {{-- PICKUP LOCATION --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Pickup Location</label>
                        <div class="input-group">
                            <input id="pickup_location" name="pickup_location" class="form-control" placeholder="Search on Maps..." required>
                            <button type="button" class="btn btn-dark" onclick="openGoogleMaps()">📍</button>
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">Click icon to find location on Google Maps</small>
                    </div>

                    {{-- ROOM --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Room No / Flight No</label>
                        <input name="room_no" class="form-control" placeholder="Optional">
                    </div>

                    {{-- TIME --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Pickup Time</label>
                        <input type="time" name="pickup_time" class="form-control" required>
                    </div>

                    {{-- MESSAGE --}}
                    <div class="col-12">
                        <label class="form-label fw-bold">Additional Message</label>
                        <textarea name="message" rows="3" class="form-control" placeholder="Any special requests (e.g., child seat)?"></textarea>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button class="btn btn-dark btn-submit shadow-lg px-5 rounded-3">
                        🚀 Send Booking Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openGoogleMaps() {
    window.open("https://www.google.com/maps", "_blank");
}
</script>
@endsection