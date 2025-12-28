@extends('layouts.app')

@section('content')
<style>
    .detail-img-card {
        border-radius: 20px;
        overflow: hidden;
        border: none;
        transition: 0.3s;
    }
    .detail-img-card:hover { transform: scale(1.02); }
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
</style>

<div class="container my-5">
    {{-- TITLE SECTION --}}
    <div class="mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tours.index') }}">Tours</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $tour->name }}</li>
            </ol>
        </nav>
        <h2 class="fw-bold display-5 text-dark">{{ $tour->name }}</h2>
        <div style="width: 50px; height: 4px; background: #FFC107; border-radius: 10px;"></div>
    </div>

    {{-- TOUR GALLERY DETAILS --}}
    <div class="row g-4 mb-5">
        @for($i = 1; $i <= 4; $i++)
            @php
                $img  = 'image_'.$i;
                $desc = 'desc_'.$i;
            @endphp

            @if($tour->$img)
            <div class="col-md-6">
                <div class="card detail-img-card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$tour->$img) }}"
                         class="card-img-top"
                         style="height:350px; object-fit:cover"
                         alt="Tour Image {{ $i }}">
                    <div class="card-body p-4 bg-white">
                        <p class="text-secondary mb-0" style="line-height: 1.6;">{{ $tour->$desc }}</p>
                    </div>
                </div>
            </div>
            @endif
        @endfor
    </div>

    {{-- BOOKING FORM --}}
    <div class="card booking-card shadow-lg border-0 mb-5">
        <div class="card-body p-lg-5 p-4">
            <div class="d-flex align-items-center mb-4">
                <div style="width: 40px; height: 40px; background: #28a745; color: white; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    📅
                </div>
                <h3 class="fw-bold m-0">Book Your Trip</h3>
            </div>

            <form action="{{ route('book.tour') }}" method="POST">
                @csrf
                <input type="hidden" name="tour_name" value="{{ $tour->name }}">

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Full Name</label>
                        <input name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Participants (min 2)</label>
                        <input type="number" name="participants" min="2" class="form-control" value="2" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">WhatsApp Number</label>
                        <input name="phone" class="form-control" placeholder="+62..." required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Booking Date</label>
                        <input type="date" name="booking_date" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Pickup Location (Paste Link/Address)</label>
                        <div class="input-group">
                            <input id="pickup_location" name="pickup_location" class="form-control" placeholder="Search on Maps..." required>
                            <button type="button" class="btn btn-dark" onclick="openGoogleMaps()">📍</button>
                        </div>
                        <small class="text-muted" style="font-size: 0.75rem;">Click icon to find location on Google Maps</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Room No / Flight No</label>
                        <input name="room_no" class="form-control" placeholder="Optional">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">Pickup Time</label>
                        <input type="time" name="pickup_time" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold">Additional Message</label>
                        <textarea name="message" class="form-control" rows="3" placeholder="Any special requests?"></textarea>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <button class="btn btn-success btn-lg px-5 py-3 rounded-pill fw-bold shadow">
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