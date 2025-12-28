@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold m-0 text-dark">🚗 Add New Car</h5>
            </div>
            <div class="card-body p-4">
                
                {{-- Alert Error jika validasi gagal --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        {{-- Nama Mobil --}}
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-bold small">Car Name</label>
                            <input class="form-control" name="name" placeholder="Car Name" value="{{ old('name') }}">
                        </div>

                        {{-- Harga --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-bold small">Price (IDR)</label>
                            <input class="form-control" name="price" placeholder="Price (IDR)" value="{{ old('price') }}">
                        </div>

                        {{-- Gambar --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Car Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        {{-- Durasi --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Duration (Hours)</label>
                            <input class="form-control" name="duration_hours" value="10">
                        </div>

                        {{-- Deskripsi --}}
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold small">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                        </div>

                        {{-- Passenger Info --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Recommended Passenger</label>
                            <input class="form-control" name="recommend_passenger" placeholder="Recommended Passenger" value="{{ old('recommend_passenger') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small">Maximum Passenger</label>
                            <input class="form-control" name="max_passenger" placeholder="Maximum Passenger" value="{{ old('max_passenger') }}">
                        </div>

                        {{-- Fasilitas --}}
                        <div class="col-12 mb-4">
                            <label class="form-label fw-bold small">Facilities</label>
                            <textarea class="form-control" name="facilities" rows="2" placeholder="Driver & Fuel Included, Mineral Water">{{ old('facilities') }}</textarea>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-light px-4 border">Back</a>
                        <button class="btn btn-success px-5 fw-bold shadow-sm">
                            💾 Save Data Car
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid #dee2e6;
    }
    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25px rgba(25, 135, 84, 0.1);
    }
    .form-label {
        color: #495057;
    }
</style>
@endsection