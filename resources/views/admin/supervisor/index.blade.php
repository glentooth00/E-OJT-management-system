@extends('includes.layouts.app')

@section('page-title', 'Supervisor')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Supervisor</h1>
        </div>


    

        <section class="mt-2">
            @if(session('success'))
            <div class="alert alert-success text-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Supervisor Accounts</h6>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i> Add Account
                        </button>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>username</th>
                                <th>Department</th>
                                <th>Office</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisor_accounts as $supervisor)
                                <tr>
                                    <td>{{ $supervisor->first_name }}</td>
                                    <td>{{ $supervisor->middle_name }}</td>
                                    <td>{{ $supervisor->last_name }}</td>
                                    <td>{{ $supervisor->username }}</td>
                                    <td>{{ $supervisor->category }}</td>
                                    <td>{{ $supervisor->office }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            data-id="{{ $supervisor->id }}"
                                            data-firstname="{{ $supervisor->first_name }}"
                                            data-middlename="{{ $supervisor->middle_name }}"
                                            data-lastname="{{ $supervisor->last_name }}"
                                            data-username="{{ $supervisor->username }}"
                                            data-category="{{ $supervisor->category }}"
                                            data-office="{{ $supervisor->office }}"
                                            data-password="{{ $supervisor->password }}"> <!-- Add the password here -->
                                            <i class="fas fa-edit"></i> EDIT
                                        </button>

                                    
                                        <form action="{{ route('supervisor.destroy', $supervisor->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this)">
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
                        <h5 class="modal-title" id="exampleModalLabel">Add new Supervisor Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content goes here -->
                        <form action="{{ route('supervisor.store') }}" method="POST">
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
                                    <label for="first_name">Firstname</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                        placeholder="Firstname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middle_name">Middlename</label>
                                    <input type="text" name="middle_name" class="form-control" id="middle_name"
                                        placeholder="Middlename">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_name">Lastname</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                        placeholder="Lastname">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="username" name="username" class="form-control" id="username"
                                        placeholder="username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="office">Office</label>
                                    <input type="text" name="office" class="form-control" id="office"
                                        placeholder="Office">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="department">Department</label>
                                    <select name="category" id="category" class="form-control">
                                        <option hidden>Select Dept.</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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

<!-- Modal Structure -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supervisor.update') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <!-- Hidden input for ID -->
                    <input type="hidden" name="id" id="supervisorId">

                    <!-- Form fields for editing -->
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" id="middlename">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="username" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="form-group">
                        <label for="office">Office</label>
                        <input type="text" class="form-control" name="office" id="office">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
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
        var username = button.data('username');
        var category = button.data('category');
        var office = button.data('office');
        // Set the current password to empty, as it's not shown in the modal
        var currentPassword = ''; // We don’t set the current password

        // Populate the modal with the data
        var modal = $(this);
        modal.find('#supervisorId').val(id);
        modal.find('#firstname').val(firstname);
        modal.find('#middlename').val(middlename);
        modal.find('#lastname').val(lastname);
        modal.find('#username').val(username);
        modal.find('#category').val(category);
        modal.find('#office').val(office);
        modal.find('#password').val(currentPassword); // Leave password field empty
    });
});

function confirmDelete(button) {
    // Ask the user for confirmation
    if (confirm('Are you sure you want to delete this supervisor?')) {
        // Submit the form if the user confirms
        button.closest('form').submit();
    }
}


</script>