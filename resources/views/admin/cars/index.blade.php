@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold m-0 text-dark">🚘 Data Cars Management</h4>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-primary px-4 rounded-3 shadow-sm">+ Add New Car</a></div>

<div class="card shadow-sm border-0 rounded-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4" width="120">Image</th>
                    <th>Car Name</th>
                    <th>Price</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td class="ps-4">
                        <img src="{{ asset('storage/'.$car->image) }}" class="rounded-3 shadow-sm border" width="80" height="55" style="object-fit: cover;">
                    </td>
                    <td><span class="fw-bold text-dark">{{ $car->name }}</span></td>
                    <td class="text-success fw-bold">IDR {{ number_format($car->price) }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.cars.edit',$car) }}" class="btn btn-sm btn-warning text-white px-3 rounded-2">Edit</a>
                        <form method="POST" action="{{ route('admin.cars.destroy',$car) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Delete this car?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection