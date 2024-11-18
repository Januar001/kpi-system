@extends('layout.main')
@section('title', 'Reports')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="#" class="btn btn-success">
                <i class="bi bi-upload"></i> Export
            </a>
            <select class="form-select ms-auto" aria-label="Default select example" style="width: auto;">
                <option selected>Assessment Period</option>
                <option value="1">Q1 - 2024 (Januari - Maret)</option>
                <option value="2">Q2 - 2024 (April - Juni)</option>
                <option value="3">Q3 - 2024 (Juli - September)</option>
                <option value="3">Q4 - 2024 (Oktober - Desember)</option>
            </select>
        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Reports</h3>

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
                            <th>Position</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Total Score</th>
                            <th>Status Performa</th>
                            {{-- <th>Action</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $index => $item)
                            <tr onclick="location.href='{{ route('reports.show', $item->id) }}';" style="cursor: pointer;">
                                {{-- <tr onclick="#" style="cursor: pointer;"> --}}
                                <td>{{ $index + 1 + ($report->currentPage() - 1) * $report->perPage() }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->department }}</td>
                                <td>{{ $item->salary }}</td>
                                <td>98</td>
                                <td>
                                    <span class="badge bg-primary">Excelent</span>
                                    {{-- <span class="badge bg-success">Good</span>
                                    <span class="badge bg-warning">Average</span>
                                    <span class="badge bg-danger">Poor</span> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{ $report->links('pagination::bootstrap-5') }}
        </div>
        <!-- /.card -->
    </div>



@endsection
