@extends('layouts.app')

@section('content')
<style>
    /* Gallery Header */
    .gallery-title {
        font-weight: 800;
        letter-spacing: -1px;
        position: relative;
        display: inline-block;
        margin-bottom: 30px;
    }
    .gallery-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 4px;
        background: #FFC107;
        border-radius: 10px;
    }

    /* Image Wrapper */
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        cursor: pointer;
        aspect-ratio: 4/3; /* Memastikan semua kotak seragam */
    }

    .gallery-img {
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    /* Hover Overlay */
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6); /* Navy transparan */
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .gallery-item:hover .gallery-img {
        transform: scale(1.15);
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .zoom-icon {
        color: white;
        font-size: 2rem;
        transform: translateY(20px);
        transition: transform 0.4s ease;
    }

    .gallery-item:hover .zoom-icon {
        transform: translateY(0);
    }
</style>

<div class="container my-5 py-4">
    <div class="text-center mb-5">
        <h2 class="gallery-title display-5">Our Travel Gallery</h2>
        <p class="text-muted">Momen tak terlupakan dari perjalanan pelanggan kami</p>
    </div>

    <div class="row g-4">
        @for($i=1;$i<=12;$i++)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="gallery-item shadow-sm">
                <img src="https://via.placeholder.com/400x300" 
                     class="gallery-img" 
                     alt="Gallery Image {{ $i }}">
                
                <div class="gallery-overlay">
                    <div class="zoom-icon">🔍</div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection