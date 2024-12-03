<div>
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
                        <select wire:model.live="selectedEmployee" id="employee" class="form-select" required>
                            <option value="" selected disabled>Select an employee...</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                {{-- <option value="1">Sudrun</option>
                            <option value="2">Budrek</option> --}}
                            @endforeach
                        </select>
                    </div>
                    <!-- Dropdown Periode -->
                    <div class="col-md-6 mb-2">
                        <select id="period" class="form-select" name="period" required>
                            <option value="" selected disabled>Select period...</option>
                            @foreach ($periods as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                {{-- <option value="1">Q1</option>
                            <option value="2">Q2</option> --}}
                            @endforeach
                        </select>
                    </div>
                    <div class="container mt-3">
                        @if ($selectedEmployee)
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                {{-- @foreach ($categories as $category) --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                            {{-- {{ $category->name }} --}}sjdlkjsakldjs
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse show"
                                        aria-labelledby="heading1">
                                        <div class="accordion-body">
                                            <input type="hidden" name="categories[1][id]" value="1">
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

                                                        <tr>
                                                            <td>1</td>
                                                            <td>dkjslkdjklsad</td>
                                                            <td>dkjslkdjklsad</td>
                                                            <td>dkjslkdjklsad</td>
                                                        </tr>
                                                        {{-- @endforeach --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan Semua</button>
                            <button type="button" class="btn btn-secondary mt-3"
                                onclick="window.location.href = '{{ route('evaluations.index') }}'">Back</button>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                Please choose Employee
                            </div>
                        @endif

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
