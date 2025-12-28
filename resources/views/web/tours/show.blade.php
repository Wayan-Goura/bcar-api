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
        position: sticky;
        top: 20px;
    }
    
    .price-tag {
        background: #eef2ff;
        color: #0d6efd;
        padding: 10px 20px;
        border-radius: 15px;
        display: inline-block;
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
    
    .itinerary-number {
        width: 40px;
        height: 40px;
        background: #FFC107;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 15px;
    }
</style>

<div class="container my-5">
    {{-- HEADER SECTION --}}
    <div class="row align-items-end mb-5">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tours.index') }}" class="text-decoration-none">Tours</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $tour->name }}</li>
                </ol>
            </nav>
            <h1 class="fw-bold display-5 text-dark">{{ $tour->name }}</h1>
            <div style="width: 60px; height: 5px; background: #FFC107; border-radius: 10px;"></div>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <div class="price-tag">
                <span class="d-block small fw-bold text-uppercase text-muted">Price Starts From</span>
                <h3 class="fw-bold m-0">Rp {{ number_format($tour->price, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>

    <div class="row g-5">
        {{-- LEFT SIDE: TOUR GALLERY & ITINERARY --}}
        <div class="col-lg-8">
            <div class="row g-4">
                @for($i = 1; $i <= 4; $i++)
                    @php
                        $img  = 'image_'.$i;
                        $desc = 'desc_'.$i;
                    @endphp

                    @if($tour->$img || $tour->$desc)
                    <div class="col-12 mb-4">
                        <div class="card detail-img-card shadow-sm border-0">
                            <div class="row g-0">
                                @if($tour->$img)
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/'.$tour->$img) }}"
                                         class="img-fluid h-100 w-100"
                                         style="object-fit:cover; min-height: 250px;"
                                         alt="Step {{ $i }}">
                                </div>
                                @endif
                                <div class="col-md-{{ $tour->$img ? '7' : '12' }}">
                                    <div class="card-body p-4">
                                        <div class="itinerary-number">{{ $i }}</div>
                                        <h5 class="fw-bold text-dark">Destination / Activity {{ $i }}</h5>
                                        <p class="text-secondary mb-0" style="line-height: 1.8; text-align: justify;">
                                            {{ $tour->$desc ?? 'No description available for this section.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>

        {{-- RIGHT SIDE: BOOKING FORM --}}
        <div class="col-lg-4">
            <div class="card booking-card shadow-lg border-0 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div style="width: 45px; height: 45px; background: #28a745; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px; font-size: 1.2rem;">
                            📅
                        </div>
                        <h4 class="fw-bold m-0">Book This Tour</h4>
                    </div>

                    <form action="{{ route('book.tour') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <input type="hidden" name="tour_name" value="{{ $tour->name }}">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input name="name" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Participants</label>
                                <input type="number" name="participants" min="1" class="form-control" value="1" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">WhatsApp</label>
                                <input name="phone" class="form-control" placeholder="0812..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Booking Date</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pickup Location</label>
                            <div class="input-group">
                                <input id="pickup_location" name="pickup_location" class="form-control" placeholder="Hotel name or address" required>
                                <button type="button" class="btn btn-dark" onclick="openGoogleMaps()">📍</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Pickup Time</label>
                                <input type="time" name="pickup_time" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Room/Flight</label>
                                <input name="room_no" class="form-control" placeholder="Optional">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Message (Optional)</label>
                            <textarea name="message" class="form-control" rows="2" placeholder="Special requests..."></textarea>
                        </div>

                        <div class="bg-light p-3 rounded-3 mb-4">
                            <div class="d-flex justify-content-between small mb-1">
                                <span>Base Price</span>
                                <span>Rp {{ number_format($tour->price, 0, ',', '.') }}</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between fw-bold text-primary">
                                <span>Total Estimate</span>
                                <span>Calculated on confirm</span>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg w-100 py-3 rounded-pill fw-bold shadow-sm">
                            🚀 Request Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openGoogleMaps() {
    window.open("https://www.google.com/maps", "_blank");
}
</script>
@endsection