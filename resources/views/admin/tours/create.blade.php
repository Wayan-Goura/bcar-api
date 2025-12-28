@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="d-flex align-items-center mb-4 text-primary">
            <h4 class="fw-bold m-0">🚀 Add New Tour Portfolio</h4>
        </div>

        <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card shadow-sm border-0 rounded-4 mb-5">
                <div class="card-body p-4 p-lg-5">
                    
                    {{-- BASIC INFO --}}
                    <div class="row g-4 mb-4">
                        <div class="col-md-5">
                            <label class="form-label small fw-bold text-muted">Tour Name</label>
                            <input name="name" class="form-control rounded-3 py-2" placeholder="e.g. Bali Cultural Tour" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-muted">Price (IDR)</label>
                            <input type="number" name="price" class="form-control rounded-3 py-2" placeholder="e.g. 500000" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Cover Image (Main Display)</label>
                            <input type="file" name="cover_image" class="form-control rounded-3 py-2" required>
                        </div>
                    </div>

                    <div class="py-3">
                        <h6 class="fw-bold text-secondary border-bottom pb-2 mb-4">Detailed Itinerary / Gallery</h6>
                    </div>

                    {{-- DETAIL IMAGES --}}
                    @for($i=1;$i<=4;$i++)
                    <div class="row g-4 mb-4 align-items-start p-3 rounded-3 bg-light mx-0 border">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Section Image {{ $i }}</label>
                            <input type="file" name="image_{{ $i }}" class="form-control rounded-3 bg-white">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-muted">Description {{ $i }}</label>
                            <textarea name="desc_{{ $i }}" rows="3" class="form-control rounded-3 bg-white" placeholder="Describe this specific part of the tour..."></textarea>
                        </div>
                    </div>
                    @endfor

                    <div class="mt-5 d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-light px-4 py-2 rounded-3 border">Cancel</a>
                        <button class="btn btn-primary px-5 py-2 rounded-3 fw-bold shadow-sm">
                            Save Tour Portfolio
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection