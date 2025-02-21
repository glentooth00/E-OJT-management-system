@extends('includes.layouts.app')

@section('page-title', 'OJT Supervisor')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">OJT Supervisors</h1>
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
        <br>
        @if(session('success'))
        <div class="alert alert-success text-success">
            {{ session('success') }}
        </div>
    @endif
    
        <section class="mt-2">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-secondary">OJT Supervisor Accounts</h6>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus"></i> Add Account
                        </button>
                        
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ojt_supervisors as $supervisor)
                                    <tr>
                                        <td>{{ $supervisor->firstname }}</td>
                                        <td>{{ $supervisor->middlename }}</td>
                                        <td>{{ $supervisor->lastname }}</td>
                                        <td>{{ $supervisor->username }}</td>
                                        <td>
                                           <!-- EDIT Button -->
                                        <button class="btn btn-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#editModal"
                                            data-id="{{ $supervisor->id }}"
                                            data-firstname="{{ $supervisor->firstname }}"
                                            data-middlename="{{ $supervisor->middlename }}"
                                            data-lastname="{{ $supervisor->lastname }}"
                                            data-username="{{ $supervisor->username }}">
                                            <i class="fas fa-edit"></i> EDIT
                                        </button>

                                       

                                            <form action="{{ route('admin.ojt_supervisor.destroy', $supervisor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supervisor?');" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> DELETE
                                                </button>
                                            </form>
                                            
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new OJT Supervisor Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content goes here -->
                        <form action="{{ route('ojt_supervisor.store') }}" method="POST">
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
                                    <input type="text" name="firstname" class="form-control" id="firstname"
                                        placeholder="Firstname">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="middlename">Middlename</label>
                                    <input type="text" name="middlename" class="form-control" id="middlename"
                                        placeholder="Middlename">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname"
                                        placeholder="Lastname">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">username</label>
                                    <input type="username" name="username" class="form-control" id="username"
                                        placeholder="username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>
                            </div>

                           



                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Modal Structure -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit OJT Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.ojt_supervisor') }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <!-- Hidden input for ID -->
                    <input type="hidden" name="id" id="adminId" value="{{  $supervisor->id }}">

                    <!-- Form fields for editing -->
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname">
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input type="text" class="form-control" name="middlename" id="middlename">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname">
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="username" class="form-control" name="username" id="username">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!---Container Fluid-->
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

        // Populate the modal with the data
        var modal = $(this);
        modal.find('#adminId').val(id);
        modal.find('#firstname').val(firstname);
        modal.find('#middlename').val(middlename);
        modal.find('#lastname').val(lastname);
        modal.find('#username').val(username);
    });
});
</script>

