@extends('layout.main')
@section('title', 'Employees')
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
                <h3 class="card-title">Employees</h3>

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
                            <th>NIP</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Hire Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($employee->currentPage() - 1) * $employee->perPage() }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->department }}</td>
                                <td>{{ 'Rp. ' . number_format($item->salary, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->hire_date)->format('d F Y') }}</td>
                                <td>
                                    <form action="{{ route('employees.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus employee ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{ $employee->links('pagination::bootstrap-5') }}
        </div>
        <!-- /.card -->
    </div>



@endsection
