@extends('includes.layouts.supervisor')

@section('page-title', 'Intern Evaluation')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Evaluation</h1>
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
                                    <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
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
                                    <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
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
                </div> --}}
            </div>
        </section>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
        <section class="mt-5">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Interns</h6>

                    {{-- <form action="{{ route('admin.filterStudents', ['status' => 'pending']) }}" method="GET">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> --}} 

                    {{-- <select name="filter" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="registered" {{ $selectedFilter == 'registered' ? 'selected' : '' }}>
                                    Registered</option>
                                <option value="pending" {{ $selectedFilter == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                            </select> --}}
                    {{-- </div>
                    </form>--}}

                    

                </div>
                <div class="table-responsive">
                    <table id="table" class="table">
                        <thead>
                            <th>Student</th>
                            <th>Designation</th>
                            <th>Course & Year Lvl</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->fullname }}</td>
                                    <td>{{ $student->designation }}</td>
                                    <td>{{ $student->course }} {{ $student->year_level }}</td>
                                    <td>
                                        <form action="{{ route('supervisor.evaluate.evaluation_form',  $student->id) }}" method="post">
                                            @csrf
                                              <button class="btn  btn-success btn-sm">Evaluate</button>
                                        </form>
                                      
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
