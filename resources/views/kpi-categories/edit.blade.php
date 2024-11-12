@extends('layout.main')
@section('title', 'Employees / Edit')
@section('content')
    <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Employee</div>
            </div> <!--end::Header-->

            <!--begin::Form-->
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                            value="{{ old('nip', $employee->nip) }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $employee->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $employee->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" name="department" id="department">
                            <option value="Kredit" {{ $employee->department == 'Kredit' ? 'selected' : '' }}>Kredit</option>
                            <option value="Operasional" {{ $employee->department == 'Operasional' ? 'selected' : '' }}>
                                Operasional</option>
                            <option value="PE" {{ $employee->department == 'PE' ? 'selected' : '' }}>PE</option>
                            <option value="Direktur" {{ $employee->department == 'Direktur' ? 'selected' : '' }}>Direktur
                            </option>
                            <option value="Komisaris" {{ $employee->department == 'Komisaris' ? 'selected' : '' }}>Komisaris
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-select" name="position" id="position">
                            <option value="Admin Kredit" {{ $employee->position == 'Admin Kredit' ? 'selected' : '' }}>
                                Admin Kredit</option>
                            <option value="Kasir" {{ $employee->position == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                            <option value="Admin Dana" {{ $employee->position == 'Admin Dana' ? 'selected' : '' }}>Admin
                                Dana</option>
                            <option value="IT" {{ $employee->position == 'IT' ? 'selected' : '' }}>IT</option>
                            <option value="Account Officer"
                                {{ $employee->position == 'Account Officer' ? 'selected' : '' }}>Account Officer</option>
                            <option value="Kabag. Kredit" {{ $employee->position == 'Kabag. Kredit' ? 'selected' : '' }}>
                                Kabag. Kredit</option>
                            <option value="Kabag. Operasional"
                                {{ $employee->position == 'Kabag. Operasional' ? 'selected' : '' }}>Kabag. Operasional
                            </option>
                            <option value="Kabag. Manrisk" {{ $employee->position == 'Kabag. Manrisk' ? 'selected' : '' }}>
                                Kabag. Manrisk</option>
                            <option value="Satpam" {{ $employee->position == 'Satpam' ? 'selected' : '' }}>Satpam</option>
                            <option value="Driver" {{ $employee->position == 'Driver' ? 'selected' : '' }}>Driver</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary"
                            value="{{ old('salary', $employee->salary) }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">Hire Date</label>
                        <input type="date" class="form-control" id="hire_date" name="hire_date"
                            value="{{ old('hire_date', $employee->hire_date) }}" required>
                    </div>
                </div> <!--end::Body-->

                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                </div>
                <!--end::Footer-->
            </form> <!--end::Form-->
        </div>
    </div>
@endsection
