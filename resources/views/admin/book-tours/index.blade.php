@extends('layouts.admin')
@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold m-0 text-dark">✈️ Booking Tours</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-secondary">
                    <tr>
                        <th class="ps-4">Tour</th>
                        <th>Customer</th>
                        <th class="text-center">Participants</th>
                        <th>WhatsApp</th>
                        <th>Date</th>
                        <th>Pickup</th>
                        <th>Status</th>
                        <th class="text-center pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $b)
                    <tr>
                        <td class="ps-4 fw-bold text-dark">{{ $b->tour_name }}</td>
                        <td>{{ $b->name }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill bg-light text-dark border">{{ $b->participants }} Pax</span>
                        </td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$b->phone) }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                💬 {{ $b->phone }}
                            </a>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($b->booking_date)->format('d M Y') }}</td>
                        <td>
                            @if(Str::startsWith($b->pickup_location,['http','https']))
                                <a href="{{ $b->pickup_location }}" target="_blank" class="text-primary text-decoration-none">📍 Open Maps</a>
                            @else
                                <span class="small text-muted">{{ Str::limit($b->pickup_location, 15) }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $b->status=='approved'?'primary':($b->status=='completed'?'success':'warning') }} opacity-75">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex gap-1 justify-content-center">
                                @if($b->status=='pending')
                                <form method="POST" action="{{ route('admin.book-tours.approve',$b->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-primary rounded-2">Approve</button>
                                </form>
                                @endif

                                @if($b->status=='approved')
                                <form method="POST" action="{{ route('admin.book-tours.complete',$b->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-success rounded-2">Complete</button>
                                </form>
                                @endif

                                <form method="POST" action="{{ route('admin.book-tours.cancel',$b->id) }}" onsubmit="return confirm('Cancel booking?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger border-0">Cancel</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection