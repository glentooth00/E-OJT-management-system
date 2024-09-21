@extends('includes.layouts.app')

@section('page-title', 'OJT Supervisor')

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
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
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
                    </form> --}}

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10%;">ID</th>
                                <th>DOB</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th>Application status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($filtered_students as $student)
                                <tr>
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
                                            <span class="bg-secondary p-2 w-10 text-capitalize text-white">Unknown Status</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-danger btn-sm view-more" 
                                            data-toggle="modal" data-target="#exampleModal" 
                                            data-fullname="{{ $student->fullname }}" 
                                            data-dob="{{ $student->dob }}" 
                                            data-idnumber="{{ $student->id_number }}" 
                                            data-department="{{ $student->department }}" 
                                            data-course="{{ $student->course }}" 
                                            data-applicationstatus="{{ $student->application_status }}">
                                            View More <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                </div>
        </section>
    </div>
    <!---Container Fluid-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modalFullName">Fullname</label>
                            <input type="text" name="fullname" class="form-control" id="modalFullName" placeholder="Fullname" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalDOB">DOB</label>
                            <input type="text" name="dob" class="form-control" id="modalDOB" placeholder="DOB" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modalIDNumber">ID Number</label>
                            <input type="text" name="id_number" class="form-control" id="modalIDNumber" placeholder="ID Number" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalDepartment">Department</label>
                            <input type="text" name="department" class="form-control" id="modalDepartment" placeholder="Department" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modalCourse">Course and Year</label>
                            <input type="text" name="course" class="form-control" id="modalCourse" placeholder="Course and Year" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalApplicationStatus">Application Status</label><br>
                            <input type="text" name="application_status" class="form-control" id="modalApplicationStatus" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalAssignedTo">Assign to</label>
                            <select name="assigned_to" class="form-control">
                                <option value=""></option>
                                <option value="Agency 1">Agency 1</option>
                                <option value="Agency 2">Agency 2</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                
        </div>
    </div>
</div>



  
@endsection

 <!-- jQuery and Bootstrap -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.view-more').on('click', function() {
        // Get the data attributes
        var fullname = $(this).data('fullname');
        var dob = $(this).data('dob');
        var idnumber = $(this).data('idnumber');
        var department = $(this).data('department');
        var course = $(this).data('course');
        var applicationstatus = $(this).data('applicationstatus');

        // Populate the modal input fields
        $('#modalFullName').val(fullname);
        $('#modalDOB').val(dob);
        $('#modalIDNumber').val(idnumber);
        $('#modalDepartment').val(department);
        $('#modalCourse').val(course);
        $('#modalApplicationStatus').val(applicationstatus);
    });
});
</script>


