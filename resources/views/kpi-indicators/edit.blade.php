@extends('layout.main')
@section('title', 'KPI Indicators / Edit')
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
                <div class="card-title">Edit KPI Indicators</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ route('kpi-indicators.update', $indicator->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            <selected value="{{ $indicator->kpiCategory->id }}">{{ $indicator->kpiCategory->name }}
                            </selected>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3"> <label for="indicators" class="form-label">Indicator</label>
                        <input class="form-control @error('indicators') is-invalid @enderror"
                            type="text"class="form-control" id="indicators" aria-describedby="indicators"
                            name="indicators" value="{{ old('indicators', $indicator->name) }}">
                        @error('indicators')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (%)</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="number"class="form-control"
                            id="weight" aria-describedby="weight" name="weight"
                            value="{{ old('weight', $indicator->weight) }}">
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input class="form-control @error('description') is-invalid @enderror"
                            type="text"class="form-control" id="description" aria-describedby="description"
                            name="description" value="{{ old('description', $indicator->description) }}">
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <!--end::Body--> <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href = '{{ route('kpi-indicators.index') }}'">Back</button>
                </div>
                <!--end::Footer-->
            </form> <!--end::Form-->
        </div>

    </div>
@endsection
