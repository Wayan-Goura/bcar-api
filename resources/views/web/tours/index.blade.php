@extends('layouts.app')

@section('content')
<style>
    .tour-card {
        border: none;
        border-radius: 20px;
        transition: all 0.3s ease;
        overflow: hidden;
        background: #fff;
    }
    .tour-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    .tour-img-wrapper {
        position: relative;
        overflow: hidden;
    }
    /* Badge Harga di atas Gambar */
    .price-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.9);
        color: #0d6efd;
        font-weight: 700;
        padding: 5px 15px;
        border-radius: 50px;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .tour-card img {
        transition: transform 0.5s ease;
    }
    .tour-card:hover img {
        transform: scale(1.1);
    }
    .btn-detail {
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s;
    }
</style>

<div class="container my-5 py-3">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5">Tour Packages</h2>
        <div style="width: 60px; height: 4px; background: #FFC107; margin: 10px auto; border-radius: 10px;"></div>
        <p class="text-muted">Pilih destinasi impian Anda dan mulai petualangan bersama kami</p>
    </div>

    <div class="row g-4">
        @foreach($tours as $tour)
        <div class="col-lg-3 col-md-6">
            <div class="card tour-card h-100 shadow-sm text-center">
                <div class="tour-img-wrapper">
                    <div class="price-badge">
                        Rp {{ number_format($tour->price, 0, ',', '.') }}
                    </div>
                    <img src="{{ asset('storage/'.$tour->cover_image) }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover"
                         alt="{{ $tour->name }}">
                </div>

                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold text-dark mb-3">{{ $tour->name }}</h5>
                    
                    <div class="mt-auto">
                        <div class="mb-3 text-primary fw-bold">
                            Starts from Rp {{ number_format($tour->price, 0, ',', '.') }}
                        </div>
                        <a href="{{ route('tours.show', $tour) }}"
                           class="btn btn-outline-primary btn-detail w-100 py-2">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection