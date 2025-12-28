@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-11">
        <div class="d-flex align-items-center mb-4 text-warning">
            <h4 class="fw-bold m-0 text-dark">📝 Edit Tour: <span class="text-primary">{{ $tour->name }}</span></h4>
        </div>

        <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card shadow-sm border-0 rounded-4 mb-5">
                <div class="card-body p-4 p-lg-5">

                    {{-- BASIC INFO --}}
                    <div class="row g-4 mb-4">
                        <div class="col-md-7">
                            <label class="form-label small fw-bold text-muted">Tour Name</label>
                            <input name="name" value="{{ $tour->name }}" class="form-control rounded-3 py-2" required>
                        </div>

                        <div class="col-md-5">
                            <label class="form-label small fw-bold text-muted">Cover Image</label>
                            @if($tour->cover_image)
                                <div class="mb-2"><img src="{{ asset('storage/'.$tour->cover_image) }}" class="rounded shadow-sm" style="height:60px"></div>
                            @endif
                            <input type="file" name="cover_image" class="form-control rounded-3 py-2">
                        </div>
                    </div>

                    <div class="py-3">
                        <h6 class="fw-bold text-secondary border-bottom pb-2 mb-4">Detailed Itinerary / Gallery</h6>
                    </div>

                    {{-- DETAILS --}}
                    @for($i=1;$i<=4;$i++)
                    <div class="row g-4 mb-4 align-items-start p-3 rounded-3 bg-light mx-0 shadow-sm border">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-muted">Section Image {{ $i }}</label>
                            @if($tour->{'image_'.$i})
                                <div class="mb-2"><img src="{{ asset('storage/'.$tour->{'image_'.$i}) }}" class="rounded shadow-sm" style="height:60px"></div>
                            @endif
                            <input type="file" name="image_{{ $i }}" class="form-control rounded-3">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-muted">Description {{ $i }}</label>
                            <textarea name="desc_{{ $i }}" rows="3" class="form-control rounded-3">{{ $tour->{'desc_'.$i} }}</textarea>
                        </div>
                    </div>
                    @endfor

                    <div class="mt-5 d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-light px-4 py-2 rounded-3 border">Back</a>
                        <button class="btn btn-success px-5 py-2 rounded-3 fw-bold shadow-sm">
                            Update Tour Data
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection