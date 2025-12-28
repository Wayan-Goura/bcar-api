@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0">✈️ Tour Packages</h4>
    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary px-4 rounded-3 shadow-sm fw-bold">
        + Add New Tour
    </a>
</div>

@if(session('success'))
<div class="alert alert-success border-0 shadow-sm rounded-3">
    ✅ {{ session('success') }}
</div>
@endif

<div class="card shadow-sm border-0 rounded-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-secondary">
                <tr>
                    <th class="ps-4" width="50">#</th>
                    <th>Cover</th>
                    <th>Tour Name</th>
                    <th>Price</th>
                    <th class="text-center" width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tours as $tour)
                <tr>
                    <td class="ps-4 text-muted">{{ $loop->iteration }}</td>

                    <td>
                        @if($tour->cover_image)
                        <img src="{{ asset('storage/'.$tour->cover_image) }}"
                             class="rounded-3 shadow-sm border"
                             style="width:80px; height:50px; object-fit:cover">
                        @else
                        <div class="bg-light rounded text-center py-2 text-muted small" style="width:80px;">No Image</div>
                        @endif
                    </td>

                    <td class="fw-bold text-dark">{{ $tour->name }}</td>
                    
                    <td>
                        <span class="badge bg-soft-success text-success border border-success px-3">
                            Rp {{ number_format($tour->price, 0, ',', '.') }}
                        </span>
                    </td>

                    <td class="text-center pe-4">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.tours.edit', $tour->id) }}"
                               class="btn btn-sm btn-warning text-white px-3 rounded-2 shadow-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.tours.destroy', $tour->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this tour?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger border-0">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <div class="mb-2 fs-2">📭</div>
                        No tours found. Start by adding a new one.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
</style>
@endsection