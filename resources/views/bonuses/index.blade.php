@extends('layout.main')
@section('title', 'Bonuses')
@section('content')
    <div class="col-6">
        <div class="card mb-4 collapsed-card">
            <div class="card-header">
                <h5 class="card-title fw-bold">Total bonus amount per period</h5>
                <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i
                            data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                            class="bi bi-dash-lg"></i> </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body"> <!--begin::Row-->
                <div class="row">
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="tab-pane active" id="timeline">
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div> <!--end::Row-->
            </div> <!-- ./card-body -->
        </div> <!-- /.card -->
    </div>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title fw-bold">Bonuses</h5>
                <div class="card-tools"> <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> <i
                            data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                            class="bi bi-dash-lg"></i> </button>
                    <button type="button" class="btn btn-tool" data-lte-toggle="card-remove"> <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div> <!-- /.card-header -->
            <div class="card-body "> <!--begin::Row-->
                <div class="row">
                    <div class="card-body pt-0">
                        <div class="tab-content">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                {{-- <div class="btn-group"> --}}
                                <a href="#" class="btn btn-success">
                                    <i class="bi bi-plus-circle"></i> Create
                                </a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Bonuses</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Search...">
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
                                                <th>Reasons</th>
                                                <th>Bonus Amount</th>
                                                <th>Bonus Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Munarman</td>
                                                <td>Performa yang bagus di setiap bulan</td>
                                                <td>Rp. 5.000.000</td>
                                                <td>15 Desember 2024</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <!-- Tombol Edit -->
                                                        <a href="#" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </a>
                                                        <form action="#" method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus indicators ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="mt-2">
                                {{-- {{ $Indicators->links('pagination::bootstrap-5') }} --}}
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div> <!--end::Row-->
        </div> <!-- ./card-body -->
    </div> <!-- /.card -->
    </div>
    <div class="col-12">

        <!-- /.card -->
    </div>

@endsection

@push('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['0', 'Q1-2024', 'Q2-2024', 'Q3-2024', 'Q4-2024'],
                datasets: [{
                    label: '#Dalam Juta',
                    data: [0, 25, 30, 25, 100],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
