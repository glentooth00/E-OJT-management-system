@extends('includes.layouts.app')

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
            @if(session('success'))
    <div class="alert alert-success text-success">
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger text-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Department head Accounts</h6>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i> Add Account
                        </button>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department_heads as $department_head)
                            <tr>
                                <td>{{ $department_head->first_name }} {{ $department_head->middle_name }} {{ $department_head->last_name }}</td>
                                <td>{{ $department_head->department }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            data-id="{{ $department_head->id }}"
                                            data-firstname="{{ $department_head->first_name }}"
                                            data-middlename="{{ $department_head->middle_name }}"
                                            data-lastname="{{ $department_head->last_name }}"
                                            data-email="{{ $department_head->email }}"
                                            data-department="{{ $department_head->department}}">
                                        <i class="fas fa-edit"></i> EDIT
                                    </button>

                                     <!-- DELETE Button with Confirmation -->
           <!-- Delete button with confirmation -->
           <form action="{{ route('department_head.destroy', $department_head->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirmDelete()">
                <i class="fas fa-trash-alt"></i> DELETE
            </button>
        </form>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add new Department Head Account</h5>
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
                                        <option>Education</option>
                                        <option>IICS</option>
                                        <option>Engineering</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Course</label>
                                    <select name="department" id="inputState" class="form-control">
                                        <option hidden>Select course</option>
                                        <option>Education</option>
                                        <option>IICS</option>
                                        <option>Engineering</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                               
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Department Head</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('department_head.update') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <!-- Hidden input for ID -->
                    <input type="hidden" name="id" id="departmentHeadId">

                    <!-- Form fields for editing -->
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" id="middlename">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            @if($departments->isNotEmpty())
                                    @foreach ($departments as $dept)
                                        <option value="{{ $dept->department_name }}"
                                            {{ isset($department_head) && $dept->department_name == $department_head->department ? 'selected' : '' }}>
                                            {{ $dept->department_name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No departments available</option>
                                @endif

                        </select>
                        
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // When the modal is shown
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var firstname = button.data('firstname');
        var middlename = button.data('middlename');
        var lastname = button.data('lastname');
        var email = button.data('email');
        var department = button.data('department'); // Get the department name

        // Populate the modal with the data
        var modal = $(this);
        modal.find('#departmentHeadId').val(id);
        modal.find('#firstname').val(firstname);
        modal.find('#middlename').val(middlename);
        modal.find('#lastname').val(lastname);
        modal.find('#email').val(email);

        // Set the department select to the current department name
        modal.find('#department').val(department);
    });
});

function confirmDelete() {
    return confirm('Are you sure you want to delete this department head? This action cannot be undone.');
}

</script>