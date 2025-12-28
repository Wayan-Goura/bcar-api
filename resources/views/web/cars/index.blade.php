@extends('layouts.app')

@section('content')
<style>
    .car-card {
        border-radius: 20px;
        transition: all 0.4s ease;
        border: none;
        background: #fff;
    }
    .car-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    .car-img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 20px 20px 0 0;
    }
    .car-card img {
        transition: transform 0.6s ease;
    }
    .car-card:hover img {
        transform: scale(1.1);
    }
    .price-tag {
        font-size: 1.1rem;
        color: #28a745;
        font-weight: 700;
    }
</style>

<div class="container my-5 py-3">
    {{-- HEADER --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold display-5">Our Premium Cars</h2>
        <div style="width: 60px; height: 4px; background: #FFC107; margin: 10px auto; border-radius: 10px;"></div>
        <p class="text-muted">Pilih armada terbaik untuk kenyamanan perjalanan Anda</p>
    </div>

    <div class="row g-4">
        @forelse($cars as $car)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card car-card h-100 shadow-sm">
                <div class="car-img-wrapper">
                    <img src="{{ asset('storage/'.$car->image) }}" 
                         class="card-img-top"
                         alt="{{ $car->name }}"
                         style="height:220px; object-fit:cover;">
                </div>

                <div class="card-body d-flex flex-column p-4">
                    <h5 class="fw-bold mb-1 text-dark">{{ $car->name }}</h5>
                    
                    <div class="price-tag mb-3">
                        IDR {{ number_format($car->price) }} 
                        <span class="text-muted fw-normal small">/ {{ $car->duration_hours }}h</span>
                    </div>

                    <p class="text-muted small mb-3">
                        {{ Str::limit($car->description, 70) }}
                    </p>

                    <div class="d-flex justify-content-between mb-3 small text-secondary">
                        <span>👥 {{ $car->recommend_passenger }}-{{ $car->max_passenger }} Pax</span>
                        <span>🎁 Full AC</span>
                    </div>

                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-dark mt-auto py-2 fw-bold shadow-sm rounded-3">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted italic">Maaf, saat ini armada belum tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection