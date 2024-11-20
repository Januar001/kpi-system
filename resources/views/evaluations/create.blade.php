@extends('layout.main')
@section('title', 'Evaluation / Create')
@section('content')
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2 class="card-title text-center"><strong>Employee KPI Evaluation</strong>
                </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-2">
                <form action="{{ route('evaluations.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3 p-2">
                        <!-- Dropdown Karyawan -->
                        <div class="col-md-6 mb-2">
                            <select id="employee" class="form-select" name="employee" required>
                                <option value="" selected disabled>Select an employee...</option>
                                @foreach ($employee as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Dropdown Periode -->
                        <div class="col-md-6 mb-2">
                            <select id="period" class="form-select" name="period" required>
                                <option value="" selected disabled>Select period...</option>
                                @foreach ($period as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="container mt-3">

                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                @foreach ($categories as $category)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $category->id }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $category->id }}" aria-expanded="true"
                                                aria-controls="collapse{{ $category->id }}">
                                                {{ $category->name }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $category->id }}" class="accordion-collapse collapse show"
                                            aria-labelledby="heading{{ $category->id }}">
                                            <div class="accordion-body">
                                                <input type="hidden" name="categories[{{ $category->id }}][id]"
                                                    value="{{ $category->id }}">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Indicator</th>
                                                                <th>Weight</th>
                                                                <th>Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($category->kpiIndicator as $index => $indicator)
                                                                <tr>
                                                                    <td>{{ $index + 1 }}</td>
                                                                    <td>{{ $indicator->name }}</td>
                                                                    <td>{{ $indicator->weight }}%</td>
                                                                    <td>
                                                                        <input type="number" class="form-control"
                                                                            min="0" max="100"
                                                                            name="categories[{{ $category->id }}][indicators][{{ $indicator->id }}]"
                                                                            placeholder="Masukkan nilai" required>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan Semua</button>
                            <button type="button" class="btn btn-secondary mt-3"
                                onclick="window.location.href = '{{ route('evaluations.index') }}'">Back</button>
                        </div>
                    </div>
                </form>
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
