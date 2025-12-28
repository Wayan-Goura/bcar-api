@extends('layouts.app')

@section('content')
<style>
    /* Contact Header */
    .contact-header {
        background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.8)), 
                    url('https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        color: white;
        border-radius: 0 0 50px 50px;
        margin-bottom: -50px;
    }

    /* Contact Info Cards */
    .info-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9;
        height: 100%;
        transition: transform 0.3s ease;
    }
    .info-card:hover { transform: translateY(-5px); }
    .icon-box {
        width: 50px;
        height: 50px;
        background: #f8fafc;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #FFC107;
    }

    /* Form Styling */
    .contact-form-card {
        background: white;
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .form-control {
        padding: 12px 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background: white;
        border-color: #FFC107;
        box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.1);
    }

    /* Map Styling */
    .map-container {
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
</style>

{{-- HEADER --}}
<div class="contact-header text-center">
    <div class="container">
        <h1 class="fw-bold display-4">Contact Us</h1>
        <p class="lead opacity-75">Kami siap membantu merencanakan perjalanan impian Anda</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 mb-5">
        {{-- INFO CARDS --}}
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-box mx-auto">📍</div>
                <h6 class="fw-bold">Our Location</h6>
                <p class="text-muted mb-0">Denpasar, Bali<br>Indonesia</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-box mx-auto">📞</div>
                <h6 class="fw-bold">Phone Number</h6>
                <p class="text-muted mb-0">+62 812 3456 7890<br>Senin - Minggu (08.00 - 20.00)</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card text-center">
                <div class="icon-box mx-auto">✉️</div>
                <h6 class="fw-bold">Email Support</h6>
                <p class="text-muted mb-0">info@travelku.com<br>support@travelku.com</p>
            </div>
        </div>
    </div>

    <div class="row g-5 align-items-center">
        {{-- MAP SECTION --}}
        <div class="col-lg-6">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126214.39213123867!2d115.154232353723!3d-8.67252037989505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2409b0e5e3859%3A0x6031b7473d588934!2sDenpasar%2C%20Kota%20Denpasar%2C%20Bali!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

        {{-- FORM SECTION --}}
        <div class="col-lg-6">
            <div class="contact-form-card">
                <h3 class="fw-bold mb-4">Send us a message</h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold">Message</label>
                        <textarea class="form-control" rows="5" placeholder="How can we help you?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 py-3 rounded-pill fw-bold shadow">
                        🚀 Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection