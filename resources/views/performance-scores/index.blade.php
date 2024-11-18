@extends('layout.main')
@section('title', 'Performance Score')
@section('content')
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="btn-group">
                <a href="#" class="btn btn-success">
                    <i class="bi bi-upload"></i> Export
                </a>
            </div>
        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Performance Score</h3>

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
                            <th>Total Score</th>
                            <th>Status Performa</th>
                            <th>Evaluation Periods</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Munarman</td>
                            <td>98</td>
                            <td><span class="badge bg-primary">Excelent</span></td>
                            <td>Q1</td>
                            <td><button class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Cetak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sutrisno</td>
                            <td>78</td>
                            <td><span class="badge bg-success">Good</span></td>
                            <td>Q1</td>
                            <td><button class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Cetak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Saropah</td>
                            <td>68</td>
                            <td><span class="badge bg-warning">Average</span></td>
                            <td>Q1</td>
                            <td><button class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Cetak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Rini</td>
                            <td>56</td>
                            <td><span class="badge bg-danger">Poor</span></td>
                            <td>Q1</td>
                            <td><button class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Cetak</button>
                            </td>
                        </tr>
                        {{-- @foreach ($Indicators as $index => $item)
                            <tr>
                                <td>{{ $index + 1 + ($Indicators->currentPage() - 1) * $Indicators->perPage() }}</td>
                                <td>{{ $item->KpiCategory->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->weight }}</td>
                                <td>{{ $item->description }}</td>
                                <td><button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="mt-2">
            {{-- {{ $Indicators->links('pagination::bootstrap-5') }} --}}
        </div>
        <!-- /.card -->
    </div>



@endsection
