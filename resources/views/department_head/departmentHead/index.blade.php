@extends('includes.layouts.department')

@section('page-title', 'Department Head')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Department Head</h1>
        </div>

        {{-- <section>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
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
                </div>
            </div>
        </section> --}}

        <section class="mt-2">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Department head Accounts</h6>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Account
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                {{-- <th>Name</th> --}}
                                <th>Name</th>
                                <th>Department</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department_heads as $department_head)
                                <tr>
                                    <td>{{ $department_head->first_name }} {{ $department_head->middle_name }}
                                        {{ $department_head->last_name }}</td>
                                    <td>{{ $department_head->department }}</td>
                                    <td>
                                        <button class="btn btn-primary">EDIT</button>
                                        <button class="btn btn-secondary">VIEW</button>
                                        <button class="btn btn-danger">DELETE</button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Depdsdartment Head Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content goes here -->
                        <form action="{{ route('department_heads.store') }}" method="POST">
                            @csrf
                            {{-- <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Firstame</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name">
                                </div>
                            </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">Firstame</label>
                                    <input type="text" name="first_name" class="form-control" id="name"
                                        placeholder="firstname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middlename">Middlename</label>
                                    <input type="middlename" name="middle_name" class="form-control" id="middlename"
                                        placeholder="middlename">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastname">Lastname</label>
                                    <input type="lastname" name="last_name" class="form-control" id="lastname"
                                        placeholder="lastname">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                        placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword4"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Department</label>
                                    <select name="department" id="inputState" class="form-control">
                                        <option hidden>Select Dept.</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->department_name }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Coursed</label>
                                    <select name="course" id="inputState" class="form-control">
                                        <option hidden>Select Course.</option>
                                       @foreach ($courses as $course)
                                           <option value="{{$course->course_initials }}"> {{ $course->course_initials }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                {{-- <div class="form-group col-md-6">
                                    <label for="inputState">Course</label>
                                    <select name="department" id="inputState" class="form-control">
                                        <option hidden>Select Dept.</option>
                                        <option>Education</option>
                                        <option>IICS</option>
                                        <option>Engineering</option>
                                    </select>
                                </div> --}}
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputAddress2">Office</label>
                                <input type="text" class="form-control" id=""
                                    placeholder="Ex. Municipal office, Bank, ">
                            </div> --}}
                            <div class="form-row">
                                {{-- <div class="form-group col-md-12">
                                    <label for="inputCity">Address</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div> --}}
                                {{-- <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div> --}}
                            </div>
                            {{-- <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button> --}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
