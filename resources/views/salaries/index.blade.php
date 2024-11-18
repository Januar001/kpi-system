@extends('layout.main')
@section('title', 'Salaries')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-start align-items-center gap-2 mb-3">
            <a href="#" class="btn btn-success">
                <i class="bi bi-upload"></i> Export Excel
            </a>
            <a href="#" class="btn btn-success">
                <i class="bi bi-printer"></i> Cetak Slip
            </a>
        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Salaries this month</h3>

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
                            <th>Base Salary</th>
                            <th>Bonus</th>
                            <th>Total Salary</th>
                            <th>Salary Month</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salary as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($salary->currentPage() - 1) * $salary->perPage() }}</td>
                                <td>{{ $item->Employee->name }}</td>
                                <td>Rp. {{ number_format($item->base_salary, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->bonus, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->total_salary, 2, ',', '.') }}</td>
                                <td>{{ $item->salary_month }}</td>
                                <td><button class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Cetak slip</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{ $salary->links('pagination::bootstrap-5') }}
        </div>
        <!-- /.card -->
    </div>



@endsection
