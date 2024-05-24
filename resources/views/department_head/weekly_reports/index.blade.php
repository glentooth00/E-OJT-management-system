@extends('includes.layouts.department')


@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Student Reports</h1>
        </div>

        <section>
            <div class="row">
                {{-- <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Registered Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $registered_students_no }}</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Pending Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pending_students_no }}</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-xl-3 col-md-6 mb-4">
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
                </div> --}}
            </div>
        </section>

        <section class="">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Interns</h6>

                    {{-- <form action="{{ route('department_head.filterStudents') }}" method="GET">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <select name="filter" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="registered" {{ $selectedFilter == 'registered' ? 'selected' : '' }}>
                                    Registered</option>
                                <option value="pending" {{ $selectedFilter == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                            </select>
                        </div>
                    </form> --}}


                </div>
                {{-- <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10%;">ID</th>
                              <th>Name</th> --}}
                {{-- <th>DOB</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th>Application status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filtered_students as $student)
                                <tr> --}}
                {{-- <td> <img src="/storage/{{ $student->id_attachment }}" alt="ID Attachment"></td> --}}
                {{-- 
                <td>{{ $student->fullname }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->id_number }}</td>
                <td>{{ $student->department }}</td>
                <td>{{ $student->course }}</td>
                <td>

                    @if ($student->application_status == 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @elseif ($student->application_status == 'registered')
                        <span class="badge badge-success">Registered</span>
                    @else
                        <span class="bg-secondary p-2 w-10 text-capitalize text-white">Unknown
                            Status</span>
                    @endif


                </td>


                <td class="text-right">

                    @if ($student->application_status !== 'registered')
                        <form action="{{ route('department_head.approveStudent', $student->id) }}" method="POST"
                            class="d-inline">
                            {!! csrf_field() !!}
                            @method('POST')
                            <button type="submit" class="m-0 btn btn-success btn-sm">Approve</button>
                        </form>
                    @endif



                    <a href="#" class="m-0 btn btn-danger btn-sm">View More <i class="fas fa-chevron-right"></i></a>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div> --}}
        </section>
    </div>


    <!---Container Fluid-->
@endsection
