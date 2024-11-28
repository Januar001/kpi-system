<div>
    <!-- Error Messages -->
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

    <!-- Card Wrapper -->
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h2 class="card-title text-center"><strong>Employee KPI Evaluation</strong></h2>
        </div>
        <div class="card-body p-2">

            <!-- Dropdown Select -->
            <div class="row mb-3 p-2">
                <!-- Dropdown Employee -->
                <div class="col-md-6 mb-2">
                    <label for="employee" class="form-label">Employee</label>
                    <select id="employee" class="form-select" wire:model="selectedEmployee" required>
                        <option value="" selected disabled>Select an employee...</option>
                        @foreach ($employees as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Dropdown Period -->
                <div class="col-md-6 mb-2">
                    <label for="period" class="form-label">Period</label>
                    <select id="period" class="form-select" wire:model="selectedPeriod" required>
                        <option value="" selected disabled>Select period...</option>
                        @foreach ($period as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Accordion for Categories -->
            <div id="accordionPanelsStayOpenExample">
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
                                                        <!-- wire:model.lazy untuk auto-save -->
                                                        <input type="number" class="form-control" min="0"
                                                            max="100"
                                                            wire:model.lazy="indicatorValues.categories[{{ $category->id }}][indicators][{{ $indicator->id }}]"
                                                            placeholder="Masukkan nilai">
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
        </div>
    </div>
</div>
