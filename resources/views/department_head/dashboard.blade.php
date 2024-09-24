@extends('includes.layouts.department')


@section('page-title', 'OJT Supervisor')

@section('content')
<style>
    .with-data:hover {
        cursor: pointer;
    }   
</style>
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
                                <th>Assigned to</th>
                                <th>MOA</th>
                                <th>Endorsement Letter</th>
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
                                        @if(empty($student->designation))
                                            <span class="badge badge-warning" >Not Assigned</span>
                                        @else
                                            <span class="badge badge-primary" >{{ $student->designation }}</span>
                                        @endif
                                    </td>
                                    <td>  
                                        @if (empty($student->moa))
                                            <span class="badge badge-danger" >No MOA</span>
                                        @else
                                            <span href="javascript:void(0)" class="badge badge-success with-data view-moa" data-toggle="modal" data-target="#moaModal" data-moa="{{ $student->moa }}">View MOA</span>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if (empty($student->endorsement))
                                            <span class="badge badge-danger" >No Endorsement letter</span>
                                        @else
                                        <span href="javascript:void(0)" 
                                        class="badge badge-success with-data view-letter" 
                                        data-toggle="modal" 
                                        data-target="#letterModal" 
                                        data-endorsement="{{ $student->endorsement }}">
                                      View Endorsement Letter
                                  </span>
                                  

                                  
                                        @endif
                                    </td>
                                    <td>
                                        @if ($student->application_status == 'pending')
                                            <span class="badge badge-warning" >Pending</span>
                                        @elseif ($student->application_status == 'registered')
                                            <span class="badge badge-success" >Registered</span>
                                        @else
                                            <span class="bg-secondary p-2 w-10 text-capitalize text-white">Unknown Status</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="d-inline-block">
                                            @if ($student->application_status == 'registered')
                                             
                                            @elseif ($student->application_status == 'pending')  
                                            <form action="{{ route('student.approve', $student->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT') <!-- For a PUT request -->
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            @endif
                                            
                                            
                                            <button type="button" class="btn btn-danger btn-sm view-more" 
                                            data-id="{{ $student->id }}" 
                                            data-endorsement="{{ $student->endorsement }}"
                                            data-fullname="{{ $student->fullname }}" 
                                            data-dob="{{ $student->dob }}" 
                                            data-idnumber="{{ $student->id_number }}" 
                                            data-department="{{ $student->department }}" 
                                            data-course="{{ $student->course }}" 
                                            data-designation="{{ $student->designation }}" 
                                            data-applicationstatus="{{ $student->application_status }}"
                                            data-moa="{{ $student->moa }}"
                                            data-toggle="modal" 
                                            data-target="#exampleModal">
                                            View More <i class="fas fa-chevron-right"></i>
                                        </button>
                                        

                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
        </section>
    </div>
    <!---Container Fluid-->

<!-- MOA Modal -->
<div class="modal fade" id="moaModal" tabindex="-1" role="dialog" aria-labelledby="moaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moaModalLabel">MOA Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="moaImage" src="{{ asset($student->moa) }}" alt="MOA" class="img-fluid">
            </div>
        </div>
    </div>
</div>





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
                <form action="{{ route('department_head.students.updateStudentStatus', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" class="form-control" id="modalId" value="{{ $student->id }}" readonly>
                            <label for="modalFullName" class="badge">Fullname</label>
                            <input type="text" name="fullname" class="form-control" id="modalFullName" value="{{ $student->fullname }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalDOB" class="badge">Date of Birth</label>
                            <input type="text" name="dob" class="form-control" id="modalDOB" value="{{ $student->dob }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modalIDNumber" class="badge">ID Number</label>
                            <input type="text" name="id_number" class="form-control" id="modalIDNumber" value="{{ $student->id_number }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalDepartment" class="badge">Department</label>
                            <input type="text" name="department" class="form-control" id="modalDepartment" value="{{ $student->department }}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modalCourse" class="badge">Course and Year</label>
                            <input type="text" name="course" class="form-control" id="modalCourse" value="{{ $student->course }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalApplicationStatus" class="badge">Application Status</label><br>
                            @if ($student->application_status == 'pending')
                            <span class="badge badge-warning" style="font-size: 30px;">PENDING</span>
                        @elseif ($student->application_status == 'registered')
                            <span class="badge badge-success" style="font-size: 30px;">REGISTERED</span>
                        @else
                            <span class="bg-secondary p-2 w-10 text-capitalize text-white">Unknown Status</span>
                        @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalAssignedTo" class="badge">Assign to</label>
                            <select name="designation" id="modalDesignation" class="form-control" placeholder>
                                <option value="{{ $student->designation }}" hidden>{{ $student->designation }}</option>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency->agency_name }}">{{ $agency->agency_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalIDNumber" class="badge text-black">Attach MOA</label>
                            <select type="file"  name="moa" id="modalMoa" value="modalMoa" class="form-control" id="modalIDNumber" >
                                <option value="" hidden>Select MOA</option>
                                @foreach ($moas as $moa)
                                    <option value="{{ $moa->moa_file }}">{{ $moa->moa_name }}</option>
                                @endforeach
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
</div>

<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">Endorsement Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="endorsementImage" src="{{ asset($student->endorsement) }}" alt="Endorsement Letter" class="img-fluid">
            </div>
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
        var id = $(this).data('id');
        var fullname = $(this).data('fullname');
        var dob = $(this).data('dob');
        var idnumber = $(this).data('idnumber');
        var department = $(this).data('department');
        var course = $(this).data('course');
        var designation = $(this).data('designation');
        var applicationstatus = $(this).data('applicationstatus');
        var moa = $(this).data('moa');

        // Populate the modal input fields
        $('#modalId').val(id);
        $('#modalDesignation').val(designation);
        $('#modalFullName').val(fullname);
        $('#modalDOB').val(dob);
        $('#modalIDNumber').val(idnumber);
        $('#modalDepartment').val(department);
        $('#modalCourse').val(course);
        $('#modalApplicationStatus').val(applicationstatus);
        $('#modalMoa').val(moa);

        // Update the form action with the correct student ID
        var formAction = "{{ route('department_head.students.updateStudentStatus', ':id') }}";
        formAction = formAction.replace(':id', id);
        $('form').attr('action', formAction);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.view-moa').forEach(function(element) {
        element.addEventListener('click', function() {
            var moaFile = this.getAttribute('data-moa');
            var moaImage = document.getElementById('moaImage');

            // Set the source for the image
            moaImage.src = `/${moaFile}`; // Ensure leading slash for correct path

            // Show the modal
            $('#moaModal').modal('show');
        });
    });
});

$(document).on('click', '.view-letter', function() {
    // Extract the 'endorsement' data from the clicked element
    var endorsement = $(this).data('endorsement');

    // Log to check if the correct endorsement letter is being passed
    console.log('Endorsement: ', endorsement);

    // Update the image source in the modal
    $('#endorsementImage').attr('src', '/' + endorsement);

    // Display the modal
    $('#letterModal').modal('show');
});

</script>


