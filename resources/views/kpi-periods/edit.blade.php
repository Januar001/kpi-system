@extends('layout.main')
@section('title', 'KPI Periods / Create')
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
                <div class="card-title">Update KPI Periods</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ route('kpi-periods.update', $periods->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3"> <label for="periods" class="form-label">Periods</label>
                        <input class="form-control @error('periods') is-invalid @enderror"
                            type="text"class="form-control" id="periods" aria-describedby="periods" name="periods"
                            value="{{ old('periods', $periods->name) }}">
                        @error('periods')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input class="form-control @error('start_date') is-invalid @enderror"
                            type="date"class="form-control" id="start_date" aria-describedby="start_date"
                            name="start_date" value="{{ old('start_date', $periods->start_date) }}">
                        @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input class="form-control @error('end_date') is-invalid @enderror"
                            type="date"class="form-control" id="end_date" aria-describedby="end_date" name="end_date"
                            value="{{ old('end_date', $periods->end_date) }}">
                        @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> <!--end::Body--> <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href = '{{ route('kpi-periods.index') }}'">Back</button>
                </div>
                <!--end::Footer-->
            </form> <!--end::Form-->
        </div>

    </div>
@endsection
