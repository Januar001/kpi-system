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
                        <tr>
                            <td>1</td>
                            <td>6510</td>
                            <td>Mustofah Januar</td>
                            <td>IT</td>
                            <td>Operasional</td>
                            <td>Rp. 4.000.000</td>
                            <td>10 Oktober 2020</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>6515</td>
                            <td>Sukirman</td>
                            <td>Account Officer</td>
                            <td>Kredit</td>
                            <td>Rp. 4.000.000</td>
                            <td>10 Oktober 2019</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{-- {{ $nasabah->links('pagination::bootstrap-5') }} --}}
        </div>
        <!-- /.card -->
    </div>
@endsection
