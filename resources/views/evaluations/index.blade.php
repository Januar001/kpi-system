@extends('layout.main')
@section('title', 'Evaluations')
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
                <a href="#" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Create
                </a>
                {{-- <form action="#" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <input type="file" name="file" id="fileInput" style="display: none;"
                        onchange="document.getElementById('importForm').submit();">

                    <button type="button" class="btn btn-secondary"
                        onclick="document.getElementById('fileInput').click();">
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
                <h3 class="card-title">Evaluations</h3>

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
                            <th>Employee</th>
                            <th>Indicator</th>
                            <th>Evaluation Score</th>
                            <th>Evaluation Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Munarman</td>
                            <td>Kerapihan</td>
                            <td>78</td>
                            <td>25 Maret 2024</td>
                            <td><button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</button>
                                {{-- <button class="btn btn-danger btn-sm">Delete</button> --}}
                            </td>
                        </tr>
                        {{-- @foreach ($Indicators as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($Indicators->currentPage() - 1) * $Indicators->perPage() }}</td>
                                <td>{{ $item->KpiCategory->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->weight }}</td>
                                <td>{{ $item->description }}</td>
                                <td><button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{-- {{ $Indicators->links('pagination::bootstrap-5') }} --}}
        </div>
        <!-- /.card -->
    </div>



@endsection
