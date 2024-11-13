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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="btn-group">
                <a href="/employees/create" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Create
                </a>
                <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <input type="file" name="file" id="fileInput" style="display: none;"
                        onchange="document.getElementById('importForm').submit();">

                    <button type="button" class="btn btn-secondary"
                        onclick="document.getElementById('fileInput').click();">
                        <i class="bi bi-download"></i> Import
                    </button>
                </form>
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
                        @foreach ($Category as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($Category->currentPage() - 1) * $Category->perPage() }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td><button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{ $Category->links('pagination::bootstrap-5') }}
        </div>
        <!-- /.card -->
    </div>



@endsection
