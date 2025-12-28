@extends('layouts.app')

@section('content')

<style>
    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

    :root {
        --primary-gold: #FFC107;
        --success-green: #28a745;
        --dark-navy: #0F172A;
        --soft-gray: #F1F5F9;
        --text-muted: #64748B;
    }

    body { 
        font-family: 'Plus Jakarta Sans', sans-serif; 
        color: #1E293B;
        overflow-x: hidden;
        background-color: #fff;
    }

    /* Hero Refinement */
    .hero {
        padding: 120px 0 !important;
        border-radius: 0 0 30px 30px;
    }

    /* Card Styling */
    .card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 20px !important;
    }
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1) !important;
    }

    /* Section Title */
    .section-title { font-weight: 800; letter-spacing: -1px; margin-bottom: 10px; }
    .title-line { width: 60px; height: 4px; background: var(--primary-gold); margin: 0 auto 20px; border-radius: 10px; }

    /* Tour Overlay */
    .tour-card { position: relative; overflow: hidden; }
    .tour-card img { transition: transform 0.5s ease; }
    .tour-card:hover img { transform: scale(1.1); }
    .tour-overlay {
        position: absolute; bottom: 0; left: 0; right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        padding: 20px; color: white;
    }

    /* --- STAR RATING SYSTEM --- */
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
    .star-rating input { display: none; }
    .star-rating label {
        font-size: 2.5rem;
        color: #ddd;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }
    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: var(--success-green);
    }

    /* --- FLOATING REVIEW BOX --- */
    .review-box {
        background: white;
        border-radius: 25px;
        padding: 30px;
        margin: 15px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        text-align: center;
        transition: all 0.3s ease;
        animation: float 4s ease-in-out infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .review-stars-active { color: var(--primary-gold); font-size: 1.1rem; margin-bottom: 10px; }
    .review-author { font-weight: 800; font-size: 0.9rem; color: var(--dark-navy); margin-top: 15px; }

    /* Carousel Control */
    .carousel-control-prev-icon, .carousel-control-next-icon {
        filter: invert(1);
    }
</style>

{{-- 🚗 HERO SECTION --}}
<header class="hero text-center text-white shadow-lg" style="background-image: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
    <div class="container py-4">
        <h1 class="fw-bolder display-4">Jelajahi Dunia dengan <br><span class="text-warning">Kenyamanan Terbaik</span></h1>
        <p class="lead mt-3 mx-auto" style="max-width: 700px; opacity: 0.9;">
            Mobil terbaik, perjalanan menakjubkan, pengemudi profesional yang siap melayani Anda sepenuh hati.
        </p>
        <a href="#cars" class="btn btn-lg btn-warning mt-4 fw-bold px-5 py-3 rounded-3 shadow">Pesan Perjalanan Anda Sekarang!</a>
    </div>
</header>

{{-- 🏎️ CHOOSE YOUR CAR --}}
<section id="cars" class="container my-5 py-5">
    <div class="text-center mb-5">
        <h2 class="section-title display-5">Choose Your Car</h2>
        <div class="title-line"></div>
        <p class="text-muted">Pilihan kendaraan terbaik dengan kenyamanan maksimal</p>
    </div>

    <div class="row g-4">
        @forelse($cars->take(4) as $car)
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 shadow-sm border-0 overflow-hidden text-center">
                <img src="{{ asset('storage/'.$car->image) }}" class="card-img-top" style="height:200px; object-fit:cover" alt="{{ $car->name }}">
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="fw-bold text-uppercase mb-2">{{ $car->name }}</h5>
                    <p class="text-primary fw-bold fs-5 mb-3">IDR {{ number_format($car->price) }} <small class="text-muted fw-normal" style="font-size: 12px;">/ {{ $car->duration_hours }} Jam</small></p>
                    <p class="small text-muted mb-4">{{ Str::limit($car->description, 80) }}</p>
                    <div style="background: var(--soft-gray); border-radius: 12px; padding: 10px; margin-bottom: 15px;" class="small">
                        <div class="d-flex justify-content-between mb-1"><span>👤 Recomend:</span> <strong>{{ $car->recommend_passenger }} Pax</strong></div>
                        <div class="d-flex justify-content-between"><span>👥 Max:</span> <strong>{{ $car->max_passenger }} Pax</strong></div>
                    </div>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-dark w-100 mt-auto fw-bold py-3 rounded-3">BOOK NOW</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5"><p class="text-muted fs-5">No cars available right now.</p></div>
        @endforelse
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('cars.index') }}" class="btn btn-outline-dark btn-lg px-5 rounded-3 fw-bold">View All Cars</a>
    </div>
</section>

{{-- 🗺️ TOUR PACKAGES --}}
<section class="bg-light py-5">
    <div class="container py-4 text-center">
        <h2 class="section-title display-5">Paket Wisata Pilihan</h2>
        <div class="title-line"></div>
        <div class="row g-4 justify-content-center">
            @foreach(['paket1.jpg' => 'Paket 1', 'paket2.jpg' => 'Paket Wisata 2', 'paket3.jpg' => 'Paket Wisata 3', 'paket4.jpg' => 'Paket Wisata 4'] as $img => $title)
            <div class="col-lg-3 col-md-6">
                <div class="card tour-card h-100 border-0 shadow-sm">
                    <img src="{{ asset('image/paketwisata/' . $img) }}" class="card-img-top" style="height: 280px; object-fit: cover;">
                    <div class="tour-overlay"><h6 class="fw-bold mb-0 text-white">{{ $title }}</h6></div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/tours" class="btn btn-outline-primary btn-lg mt-5 px-5 rounded-3 fw-bold">Lihat Semua Paket</a>
    </div>
</section>

{{-- 🧑‍🤝‍🧑 TOUR GUIDES --}}
<section class="container my-5 py-5 text-center">
    <h2 class="section-title display-5 fw-bold">Pemandu Wisata Profesional</h2>
    <div class="title-line mb-5" style="width: 60px; height: 4px; background: #FFC107; margin: 10px auto; border-radius: 10px;"></div>
    
    <div class="row g-4">
        @php
            // Daftar Pemandu: Sesuaikan nama file foto di folder public/image/pemandu/
            $guides = [
                ['name' => 'Made Sukra', 'specialist' => 'Budaya & Sejarah', 'photo' => 'pemandu2.jpg'],
                ['name' => 'Putu Ayu', 'specialist' => 'Wisata Kuliner', 'photo' => 'pemandu1.jpg'],
                ['name' => 'Gede Dharma', 'specialist' => 'Petualangan Alam', 'photo' => 'pemandu4.jpg'],
                ['name' => 'Ketut Sari', 'specialist' => 'Fotografi Wisata', 'photo' => 'pemandu3.jpg'],
            ];
        @endphp

        @foreach($guides as $guide)
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100 guide-card">
                {{-- Foto Lingkaran --}}
                <div class="guide-img-container mb-3 mx-auto">
                    <img src="{{ asset('image/pemandu/' . $guide['photo']) }}" 
                         class="rounded-circle shadow-sm" 
                         alt="{{ $guide['name'] }}"
                         style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #fff;">
                </div>
                
                <h5 class="fw-bold mb-1 text-dark">{{ $guide['name'] }}</h5>
                <p class="text-primary small fw-bold mb-2">{{ $guide['specialist'] }}</p>
                
                <div class="social-links mt-2">
                    <span class="badge bg-light text-muted fw-normal p-2">⭐ 4.9 Rating</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
{{-- 👨‍✈️ OUR DRIVERS --}}
<section class="bg-light py-5 text-center">
    <div class="container py-4">
        <h2 class="section-title display-5 fw-bold">Pengemudi Terpercaya</h2>
        <div class="title-line mb-5" style="width: 60px; height: 4px; background: #FFC107; margin: 10px auto; border-radius: 10px;"></div>
        
        <div class="row g-4">
            @php
                // Daftar driver kamu - Sesuaikan nama file dengan yang ada di folder public/img/drivers/
                $drivers = [
                    ['name' => 'Budi Santoso', 'photo' => 'driver1.jpg', 'rating' => 5],
                    ['name' => 'Agus Wijaya', 'photo' => 'driver2.jpg', 'rating' => 5],
                    ['name' => 'I Wayan Bali', 'photo' => 'driver3.jpg', 'rating' => 5],
                    ['name' => 'Slamet Riyadi', 'photo' => 'driver4.jpg', 'rating' => 5],
                ];
            @endphp

            @foreach($drivers as $driver)
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm overflow-hidden h-100 driver-card">
                    <div class="img-wrapper" style="overflow: hidden;">
                        {{-- Pastikan foto diletakkan di: public/assets/img/drivers/ --}}
                        <img src="{{ asset('image/driver/' . $driver['photo']) }}" 
                             class="card-img-top" 
                             alt="{{ $driver['name'] }}"
                             style="height: 250px; object-fit: cover; transition: 0.3s;">
                    </div>
                    <div class="card-body bg-white">
                        <h5 class="fw-bold mb-1">{{ $driver['name'] }}</h5>
                        <div class="text-warning small">
                            @for($s=0; $s<$driver['rating']; $s++) ★ @endfor
                        </div>
                        <p class="text-muted small mb-0">Professional Driver</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 📝 CUSTOMER REVIEW SECTION --}}
<section class="bg-light py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title display-5">Ulasan Pelanggan</h2>
            <div class="title-line"></div>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-pill text-center mb-4">{{ session('success') }}</div>
        @endif

        {{-- Form --}}
        <div class="card p-lg-5 p-4 shadow-lg mb-5" style="border-radius: 30px !important;">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div class="row g-4 align-items-center text-center">
                    <div class="col-md-12">
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5" required/><label for="star5">★</label>
                            <input type="radio" id="star4" name="rating" value="4"/><label for="star4">★</label>
                            <input type="radio" id="star3" name="rating" value="3"/><label for="star3">★</label>
                            <input type="radio" id="star2" name="rating" value="2"/><label for="star2">★</label>
                            <input type="radio" id="star1" name="rating" value="1"/><label for="star1">★</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control rounded-pill" placeholder="Nama Anda" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="message" class="form-control rounded-pill" placeholder="Ceritakan pengalaman Anda..." required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100 py-2 rounded-3 fw-bold">Kirim</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Carousel --}}
        <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($reviews->chunk(2) as $key => $chunk)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="row px-md-5">
                        @foreach($chunk as $rev)
                        <div class="col-md-6">
                            <div class="review-box">
                                <div class="review-stars-active">@for($i=1;$i<=5;$i++) {{ $i<=$rev->rating ? '★':'☆' }} @endfor</div>
                                <p class="text-muted italic">"{{ $rev->message }}"</p>
                                <div class="review-author">{{ $rev->name }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @empty
                <p class="text-center text-muted">Belum ada ulasan.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection