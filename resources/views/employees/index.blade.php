@extends('layout.main')
@section('title', 'Employees')
@section('content')
    <div class="col-12">
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
                            <th>Position</th>
                            <th>Department</th>
                            <th>Salary</th>
                            <th>Hire Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($employee->currentPage() - 1) * $employee->perPage() }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->department }}</td>
                                <td>{{ 'Rp. ' . number_format($item->salary, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->hire_date)->format('d F Y') }}</td>
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
