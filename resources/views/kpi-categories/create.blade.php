@extends('layout.main')
@section('title', 'Employees / Create')
@section('content')
    <div class="col-md-8">
        {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
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
                <div class="card-title">Create New Employee</div>
            </div> <!--end::Header--> <!--begin::Form-->
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3"> <label for="nip" class="form-label">NIP</label>
                        <input type="text"class="form-control" id="nip" aria-describedby="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text"class="form-control" id="name" aria-describedby="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"class="form-control" id="email" aria-describedby="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" aria-label="Default select example" name="department">
                            <option selected>Open this select menu</option>
                            <option value="Kredit">Kredit</option>
                            <option value="Operasional">Operasional</option>
                            <option value="PE">PE</option>
                            <option value="Direktur">Direktur</option>
                            <option value="Komisaris">Komisaris</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select class="form-select" aria-label="Default select example" name="position">
                            <option selected>Open this select menu</option>
                            <option value="Admin Kredit">Admin Kredit</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Admin Dana">Admin Dana</option>
                            <option value="IT">IT</option>
                            <option value="Account Officer">Account Officer</option>
                            <option value="Kabag. Kredit">Kabag. Kredit</option>
                            <option value="Kabag. Operasional">Kabag. Operasional</option>
                            <option value="Kabag. Manrisk">Kabag. Manrisk</option>
                            <option value="Satpam">Satpam</option>
                            <option value="Driver">Driver</option>
                        </select>
                    </div>
                    <div class="mb-3"> <label for="salary" class="form-label">Salary</label>
                        <input type="number"class="form-control" id="salary" aria-describedby="salary" name="salary">
                    </div>
                    <div class="mb-3"> <label for="hire_date" class="form-label">Hire Date</label>
                        <input type="date"class="form-control" id="hire_date" aria-describedby="hire_date"
                            name="hire_date">
                    </div>
                </div> <!--end::Body--> <!--begin::Footer-->
                <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
                <!--end::Footer-->
            </form> <!--end::Form-->
        </div>

    </div>
@endsection
