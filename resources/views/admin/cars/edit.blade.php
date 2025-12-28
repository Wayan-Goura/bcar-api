@extends('layouts.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card shadow-sm border-0 rounded-4 px-3">
            <div class="card-body p-4 p-lg-5">
                <div class="d-flex align-items-center mb-4 text-warning">
                    <h4 class="fw-bold m-0">📝 Edit Car Details</h4>
                </div>
                <hr class="mb-4 opacity-25">

                <form method="POST" action="{{ route('admin.cars.update', $car->id) }}" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-muted">Car Name</label>
                            <input class="form-control rounded-3 py-2" name="name" value="{{ $car->name }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Price (IDR)</label>
                            <input class="form-control rounded-3 py-2" name="price" value="{{ $car->price }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Description</label>
                            <textarea class="form-control rounded-3" name="description" rows="4">{{ $car->description }}</textarea>
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/'.$car->image) }}" width="200" class="rounded-3 border shadow-sm">
                            </div>
                            <input type="file" class="form-control rounded-3" name="image">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        </div>
                    </div>

                    <div class="mt-5 d-flex gap-2">
                        <button class="btn btn-primary px-5 py-2 rounded-3 fw-bold shadow-sm">Update Car Data</button>
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-light px-4 py-2 rounded-3 border">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection