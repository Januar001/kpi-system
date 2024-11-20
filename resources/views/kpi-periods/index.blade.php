@extends('layout.main')
@section('title', 'KPI Periods')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="/kpi-periods/create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Create
            </a>
        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">KPI Periods</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search...">
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Periode</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($period as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($period->currentPage() - 1) * $period->perPage() }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('d F Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('d F Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('kpi-periods.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('kpi-periods.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus periods ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{ $period->links('pagination::bootstrap-5') }}
        </div>
        <!-- /.card -->
    </div>



@endsection
