@extends('layout.main')
@section('title', 'KPI Categories')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">

            <a href="/kpi-categories/create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Create
            </a>
            {{-- <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                @csrf
                <input type="file" name="file" id="fileInput" style="display: none;"
                    onchange="document.getElementById('importForm').submit();">

                <button type="button" class="btn btn-secondary" onclick="document.getElementById('fileInput').click();">
                    <i class="bi bi-download"></i> Import
                </button>
            </form> --}}
            {{-- <a href="#" class="btn btn-success">
                    <i class="bi bi-upload"></i> Export Excel
                </a> --}}
        </div>
    </div>
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">KPI Categories</h3>

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
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $index => $item)
                        <tr>
                            <td>{{ $index + 1 + ($category->currentPage() - 1) * $category->perPage() }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kpi-categories.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('kpi-categories.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus category ini?');">
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
        {{ $category->links('pagination::bootstrap-5') }}
    </div>
    <!-- /.card -->



@endsection
