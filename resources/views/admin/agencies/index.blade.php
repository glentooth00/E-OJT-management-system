@extends('includes.layouts.app')

@section('page-title', 'Agency')

@section('content')
    <!-- Container Fluid-->
    <div class="container">

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

        
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Agency</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add New
                    Agency</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Agency</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Supervisor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agencies as $agency)
    <tr>
        <td>{{ $agency->agency_name }}</td>
        <td>{{ $agency->agency_email }}</td>
        <td>{{ $agency->agency_contact }}</td>
        <td>{{ $agency->agency_supervisor }}</td>
        <td>
            @if ($agency->status ==  'Active')
             <span class="badge p-2 alert-success">{{ $agency->status }}</span>
            @else
                 <span class="badge p-2 alert-danger">Inactive</span>
            @endif
           
        </td>
        <td>
            <!-- Edit Button with Data Attributes -->
            <button class="btn btn-primary btn-sm edit-btn" 
            data-id="{{ $agency->id }}"
            data-name="{{ $agency->agency_name }}" 
            data-email="{{ $agency->agency_email }}" 
            data-contact="{{ $agency->agency_contact }}" 
            data-supervisor="{{ $agency->agency_supervisor }}" 
            data-status="{{ $agency->status }}"
        > 
            Edit
        </button>

 <!-- Delete Button -->
 <form action="{{ route('delete.agency', $agency->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete(event, '{{ $agency->agency_name }}')">Delete</button>
</form>
        
        </td>
    </tr>
@endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add New Agency</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.agency.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="organizationName">Agency <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="agency_name" id="organizationName"
                                placeholder="Agency Name" required>
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Email <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="agency_email" id="organizationName"
                                placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Contact <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="agency_contact" id="organizationName"
                                placeholder="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Supervisor <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="agency_supervisor" id="organizationName"
                                placeholder="Supervisor" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="Active" class="form-control" name="status" id="organizationName"
                                placeholder="status" readonly>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Agency</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->


<!-- Edit Agency Modal -->
<div class="modal fade" id="editAgencyModal" tabindex="-1" role="dialog" aria-labelledby="editAgencyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAgencyModalLabel">Edit Agency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.agency') }}" method="post" id="editAgencyForm">
                    @csrf
                    @method('put')
                    <!-- Agency ID Field -->
                    <div class="form-group">
                        {{-- <label for="agencyId">Agency ID</label> --}}
                        <input type="hidden" class="form-control" name="id" id="agencyId" >
                    </div>
                    <div class="form-group">
                        <label for="agencyName">Agency Name</label>
                        <input type="text" class="form-control" name="agency_name" id="agencyName" >
                    </div>
                    <div class="form-group">
                        <label for="agencyEmail">Agency Email</label>
                        <input type="email" class="form-control" name="agency_email" id="agencyEmail" >
                    </div>
                    <div class="form-group">
                        <label for="agencyContact">Agency Contact</label>
                        <input type="text" class="form-control" name="agency_contact" id="agencyContact" >
                    </div>
                    <div class="form-group">
                        <label for="agencySupervisor">Agency Supervisor</label>
                        <input type="text" class="form-control" name="agency_supervisor" id="agencySupervisor" >
                    </div>
                    <div class="form-group">
                        <label for="agencyStatus">Status</label><br>
                        <select class="form-control" name="status" id="agencyStatus" style="font-size: 1.1em;">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">Update</
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            </div>
        </form>
        </div>
    </div>
</div>
</div>

@endsection
<!-- jQuery and Bootstrap JavaScript -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript (make sure it's after jQuery) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).on('click', '.edit-btn', function () {
    // Get data attributes from the clicked button
    const agencyId = $(this).data('id');
    const agencyName = $(this).data('name');
    const agencyEmail = $(this).data('email');
    const agencyContact = $(this).data('contact');
    const agencySupervisor = $(this).data('supervisor');
    const agencyStatus = $(this).data('status');

    // Populate the modal fields
    $('#agencyId').val(agencyId);
    $('#agencyName').val(agencyName);
    $('#agencyEmail').val(agencyEmail);
    $('#agencyContact').val(agencyContact);
    $('#agencySupervisor').val(agencySupervisor);
    $('#agencyStatus').val(agencyStatus);

    // Open the modal
    $('#editAgencyModal').modal('show');
});


    // JavaScript to close the modal
document.getElementById('closeModalBtn').addEventListener('click', function () {
    $('#editAgencyModal').modal('hide');
});


// JavaScript to confirm deletion with a simple alert
function confirmDelete(event, agencyName) {
    // Ask user for confirmation before proceeding
    if (!confirm("Are you sure you want to delete the agency: " + agencyName + "?")) {
        // If not confirmed, prevent form submission
        event.preventDefault();
    }
}

</script>
