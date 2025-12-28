<div class="bg-dark text-white p-3 d-flex flex-column shadow" 
     style="width: 260px; height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000; transition: all 0.3s;">
    
    <div class="text-center mb-4 pt-2">
        <h5 class="fw-bold text-uppercase tracking-wider" style="letter-spacing: 2px;">
            <span class="text-warning">Admin</span> Panel
        </h5>
        <hr class="border-secondary opacity-25">
    </div>

    <ul class="nav nav-pills flex-column mb-auto">
        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="/admin/dashboard" class="nav-link text-white py-2 px-3 d-flex align-items-center {{ request()->is('admin/dashboard') ? 'active bg-primary' : 'hover-effect' }}">
                <span class="me-3">📊</span> Dashboard
            </a>
        </li>

        <div class="small text-muted text-uppercase fw-bold mb-2 mt-3" style="font-size: 0.7rem;">Data Master</div>
        
        <li class="nav-item mb-2">
            <a href="/admin/cars" class="nav-link text-white py-2 px-3 d-flex align-items-center {{ request()->is('admin/cars*') ? 'active bg-primary' : 'hover-effect' }}">
                <span class="me-3">🚗</span> Data Cars
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/admin/tours" class="nav-link text-white py-2 px-3 d-flex align-items-center {{ request()->is('admin/tours*') ? 'active bg-primary' : 'hover-effect' }}">
                <span class="me-3">✈️</span> Data Tours
            </a>
        </li>

        <div class="small text-muted text-uppercase fw-bold mb-2 mt-3" style="font-size: 0.7rem;">Pemesanan</div>

        <li class="nav-item mb-2">
            <a href="/admin/book-cars" class="nav-link text-white py-2 px-3 d-flex align-items-center {{ request()->is('admin/book-cars*') ? 'active bg-primary' : 'hover-effect' }}">
                <span class="me-3">📘</span> Book Cars
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/admin/book-tours" class="nav-link text-white py-2 px-3 d-flex align-items-center {{ request()->is('admin/book-tours*') ? 'active bg-primary' : 'hover-effect' }}">
                <span class="me-3">📕</span> Book Tours
            </a>
        </li>
    </ul>

    <hr class="border-secondary opacity-25">

    {{-- User Info & Logout --}}
    <div class="dropdown mt-2">
        <form method="POST" action="/admin/logout">
            @csrf
            <button class="btn btn-outline-danger btn-sm w-100 rounded-pill d-flex align-items-center justify-content-center py-2">
                <span class="me-2">🚪</span> <strong>Logout</strong>
            </button>
        </form>
    </div>
</div>

<style>
    /* Agar Konten Utama Tidak Tertutup Sidebar */
    body {
        padding-left: 260px; /* Sesuaikan dengan lebar sidebar */
        background-color: #f8fafc;
    }

    .nav-link {
        border-radius: 10px;
        transition: all 0.3s ease;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .hover-effect:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #FFC107 !important;
        transform: translateX(5px);
    }

    .nav-link.active {
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }
</style>