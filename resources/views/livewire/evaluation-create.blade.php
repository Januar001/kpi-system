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

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h2 class="card-title text-center"><strong>Employee KPI Evaluation</strong></h2>
        </div>
        <div class="card-body p-2">
            <form wire:submit.prevent="saveEvaluation">
                @csrf
                <div class="row mb-3 p-2">
                    <!-- Dropdown Karyawan -->
                    <div class="col-md-6 mb-2">
                        <select wire:model.live="selectedEmployee" class="form-select" required>
                            <option value="" selected disabled>Select an employee...</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container mt-3">
                        @if ($selectedEmployee == null)
                            <div class="alert alert-danger" role="alert">
                                Please select an employee
                            </div>
                        @else
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                @foreach ($groupedIndicators as $categoryName => $indicators)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true"
                                                aria-controls="collapse{{ $loop->index }}">
                                                {{ $categoryName }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse show"
                                            aria-labelledby="heading{{ $loop->index }}">
                                            <div class="accordion-body">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Indicator</th>
                                                                <th>Weight</th>
                                                                <th>Description</th>
                                                                <th class=" px-4">Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($indicators as $indicator)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $indicator->name }}</td>
                                                                    <td>{{ $indicator->weight }}</td>
                                                                    <td>{{ $indicator->description }}</td>
                                                                    <td>
                                                                        <!-- Input untuk nilai, bind dengan indicatorValues -->
                                                                        <input type="number"
                                                                            wire:model="indicatorValues.{{ $indicator->id }}"
                                                                            class="form-control"
                                                                            value="{{ $indicatorValues[$indicator->id] ?? '' }}" />
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
                            <button wire:click="saveEvaluation" type="button"
                                class="btn btn-primary mt-3">Save</button>
                            <button type="button" class="btn btn-secondary mt-3"
                                onclick="window.location.href = '{{ route('evaluations.index') }}'">Back</button>
                        @endif

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
