@extends('layouts.admin')

@section('content')
<style>
    /* Admin Dashboard Refinement */
    .admin-card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
        background: #ffffff;
    }
    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .status-dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    .table thead th {
        background-color: #f8fafc;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        color: #64748b;
        border-top: none;
    }
    .review-item {
        border-left: 4px solid #28a745;
        background: #f8fff9;
        border-radius: 8px;
        margin-bottom: 15px;
        padding: 15px;
    }
    .star-green { color: #28a745; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold m-0 text-dark">📊 Admin Dashboard</h3>
    <span class="text-muted small">{{ now()->format('l, d F Y') }}</span>
</div>

{{-- 🚀 TOP STAT CARDS --}}
<div class="row g-4 mb-4">
    @foreach([
        ['Total Cars', $totalCars, 'primary', '🚗', 'bg-light-primary'],
        ['Total Tours', $totalTours, 'success', '✈️', 'bg-light-success'],
        ['Car Bookings', $totalBookCars, 'warning', '📘', 'bg-light-warning'],
        ['Tour Bookings', $totalBookTours, 'danger', '📕', 'bg-light-danger'],
    ] as [$title, $value, $color, $icon, $bg])
    <div class="col-md-3">
        <div class="card admin-card p-4 shadow-sm border-0">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-{{ $color }} bg-opacity-10 text-{{ $color }} me-3">
                    {{ $icon }}
                </div>
                <div>
                    <h6 class="text-muted mb-1 small fw-bold text-uppercase">{{ $title }}</h6>
                    <h3 class="fw-bold m-0">{{ $value }}</h3>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- 📊 CHARTS SECTION --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- 📊 CHARTS SECTION --}}
<div class="row g-4 mb-4">
    <div class="col-md-7">
        <div class="card admin-card p-4 shadow-sm h-100" style="max-height: 400px;">
            <h6 class="fw-bold mb-4 text-dark"><i class="bi bi-graph-up me-2"></i>Booking & Revenue Trend</h6>
            <div style="position: relative; height: 250px;"> <canvas id="mainChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card admin-card p-4 shadow-sm h-100">
            <h6 class="fw-bold mb-3 text-dark">📌 Booking Status Split</h6>
            <div class="row g-3">
                @foreach([
                    ['Pending', $pending, 'warning'],
                    ['Approved', $approved, 'primary'],
                    ['Completed', $completed, 'success'],
                    ['Canceled', $canceled, 'danger'],
                ] as [$label, $value, $color])
                <div class="col-6">
                    <div class="p-3 border rounded-3 bg-light">
                        <small class="text-muted d-block mb-1 text-uppercase" style="font-size: 10px;">{{ $label }}</small>
                        <h4 class="fw-bold m-0 text-{{ $color }}">{{ $value }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <div class="mt-2 small text-muted text-center italic">
                Data status pemesanan terupdate secara real-time.
            </div>
        </div>
    </div>
</div>

{{-- 📅 CALENDAR & LATEST BOOKINGS --}}
<div class="row g-4 mb-4">
    <div class="col-md-8">
        <div class="card admin-card shadow-sm overflow-hidden">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="fw-bold m-0">📋 Latest Tour Bookings</h6>
                <a href="{{ route('admin.book-tours.index') }}" class="btn btn-xs btn-primary rounded-pill px-3 py-1 small">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Tour Name</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestBookings as $b)
                        <tr>
                            <td class="ps-4 fw-semibold text-dark">{{ $b->tour_name }}</td>
                            <td>{{ $b->name }}</td>
                            <td>
                                <span class="badge rounded-pill bg-{{ $b->status=='completed'?'success':($b->status=='approved'?'primary':'warning') }} bg-opacity-10 text-{{ $b->status=='completed'?'success':($b->status=='approved'?'primary':'warning') }} px-3">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$b->phone) }}" target="_blank" class="btn btn-success btn-sm rounded-circle">
                                    <i class="bi bi-whatsapp"></i> 💬
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
        <div class="card admin-card shadow-sm p-3 h-100">
            <h6 class="fw-bold mb-3">📅 Booking Calendar</h6>
            <div id="calendar" style="font-size: 0.8rem;"></div>
        </div>
    </div>
</div>

{{-- ⭐ LATEST CUSTOMER REVIEWS (NEW BOX) --}}
<div class="card admin-card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <h6 class="fw-bold m-0">⭐ Recent Customer Reviews</h6>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($reviews->take(4) as $review)
            <div class="col-md-6">
                <div class="review-item">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold m-0">{{ $review->name }}</h6>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $review->rating ? 'star-green' : 'text-muted' }} small">★</span>
                        @endfor
                    </div>
                    <p class="small text-secondary mb-0">"{{ $review->message }}"</p>
                </div>
            </div>
            @empty
            <div class="text-center py-4 text-muted small">Belum ada ulasan dari pelanggan.</div>
            @endforelse
        </div>
    </div>
</div>

{{-- CHART SCRIPT --}}
<script>
    // Gabungan Booking & Revenue Chart (Line + Bar)
    const ctx = document.getElementById('mainChart').getContext('2d');
    new Chart(ctx, {
        data: {
            labels: {!! json_encode(array_keys($bookingChart->toArray())) !!},
            datasets: [{
                type: 'line',
                label: 'Bookings',
                data: {!! json_encode(array_values($bookingChart->toArray())) !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.4
            }, {
                type: 'bar',
                label: 'Revenue (x1k)',
                data: {!! json_encode(array_values($revenueChart->toArray())) !!},
                backgroundColor: 'rgba(25, 135, 84, 0.2)',
                borderColor: '#198754',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: { y: { beginAtZero: true, grid: { display: false } } }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            height: 'auto',
            headerToolbar: { left: 'prev', center: 'title', right: 'next' },
            events: {!! json_encode($calendarBookings) !!}
        }).render();
    });
</script>

@endsection