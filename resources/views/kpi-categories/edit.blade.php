@extends('layout.main')
@section('title', 'KPI Categories / Edit')
@section('content')
    <div class="col-md-8">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit KPI Categories</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ route('kpi-categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3"> <label for="categories" class="form-label">Category</label>
                        <input class="form-control @error('categories') is-invalid @enderror"
                            type="text"class="form-control" id="categories" aria-describedby="categories"
                            name="categories" value="{{ old('categories', $category->name) }}">
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input class="form-control @error('description') is-invalid @enderror"
                            type="text"class="form-control" id="description" aria-describedby="description"
                            name="description" value="{{ old('description', $category->description) }}">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <!--end::Body--> <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href = '{{ route('kpi-categories.index') }}'">Back</button>
                </div>
                <!--end::Footer-->
            </form> <!--end::Form-->
        </div>

    </div>
@endsection
