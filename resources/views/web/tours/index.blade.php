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
                    <img src="{{ asset('storage/'.$tour->cover_image) }}"
                         class="card-img-top"
                         style="height:220px; object-fit:cover"
                         alt="{{ $tour->name }}">
                </div>

                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="fw-bold text-dark mb-3">{{ $tour->name }}</h5>
                    
                    <div class="mt-auto">
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