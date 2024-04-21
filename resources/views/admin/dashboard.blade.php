@extends('includes.layouts.app')


@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <section>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Registered Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">20</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Pending Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">10</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Agencies</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">10</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-regular fa-building fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Newly Registered Interns</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10%;">ID</th>
                                {{-- <th>Name</th> --}}
                                <th>DOB</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registered_students as $student)
                                <tr>
                                    {{-- <td>
                                        <img style="width:100%;" src="/storage/{{ $student->id_attachment }}"
                                            alt="{{ $student->fullname }}">
                                    </td> --}}
                                    <td>{{ $student->fullname }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->username }}</td>
                                    <td>{{ $student->department }}</td>
                                    <td>{{ $student->course }}</td>
                                    <td class="text-right">
                                        <a href="#" class="m-0 btn btn-danger btn-sm">View More <i
                                                class="fas fa-chevron-right"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
