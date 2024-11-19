@extends('layout.main')
@section('title', 'Reports Detail')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2 class="card-title text-center"><strong>Employee Performance Report</strong>
                </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table text-wrap">
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <td>{{ $report->name }}</td>
                            </tr>
                            <tr>
                                <th>Position</th>
                                <th>:</th>
                                <td>{{ $report->position }}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <th>:</th>
                                <td>{{ $report->department }}</td>
                            </tr>
                            <tr>
                                <th>Period</th>
                                <th>:</th>
                                <td>Q1 - 2024 (Januari- Maret)</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <th>:</th>
                                <td>Rp. 5.000.000</td>
                            </tr>
                            <tr>
                                <th>Performa</th>
                                <th>:</th>
                                <td><span class="badge bg-primary">Excelent</span></td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <th>:</th>
                                <td>Sangat baik dalam pencapaian target dan kepuasan nasabah. Perlu meningkatkan kerja sama
                                    tim</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <!-- Elemen lainnya -->
                        <div class="end mt-auto">
                            <h5 class="text-center">Performance Score</h5>
                            <canvas id="reportChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{-- {{ $Indicators->links('pagination::bootstrap-5') }} --}}
        </div>
        <!-- /.card -->
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2 class="card-title text-center"><strong>Indicator and KPI Score</strong>
                </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Indicator</th>
                                        <th>Weight</th>
                                        <th>Score</th>
                                        <th>Weighted Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $index => $item)
                                        @foreach ($item->kpiIndicator as $indicator)
                                            <tr>
                                                <!-- Tampilkan nomor dan nama kategori hanya di baris pertama indikator -->
                                                @if ($loop->first)
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                @else
                                                    <td></td>
                                                    <td></td>
                                                @endif

                                                <!-- Nama Indikator -->
                                                <td>{{ $indicator->name }}</td>
                                                <td>{{ $indicator->weight }}</td>
                                                <td>200</td>
                                                <td>100</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <thead>
                                        <tr>
                                            <th>Total :</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>2000</th>
                                        </tr>
                                    </thead>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{-- {{ $Indicators->links('pagination::bootstrap-5') }} --}}
        </div>
        <!-- /.card -->
    </div>

@endsection

@push('custom-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('reportChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['0', 'Q1-2024', 'Q2-2024', 'Q3-2024', 'Q4-2024'],
                datasets: [{
                    label: '#Point',
                    data: [0, 50, 68, 75, 89],
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
