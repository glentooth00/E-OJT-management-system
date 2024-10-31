@extends('includes.layouts.app')

@section('page-title', 'Evaluation')

@section('content')
    <!-- Container Fluid-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container">
        @if(session('success'))
    <div class="alert alert-success text-success">
        {{ session('success') }}
    </div>
    @endif

        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Add Evaluation</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add Question</button>
                <table id="table1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Evaluation</th>
                            <th>Points</th>
                            <th>Type</th>
                            <th>Add to Evaluation form</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questionItems as $questionItem)
                            <tr>
                                <td>{{ $questionItem->question }}</td>
                                <td>{{ $questionItem->points }}</td>
                                <td>{{ $questionItem->type }}</td>
                                <td>
                                    <form action="{{ route('admin.updateStatus', $questionItem->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="checkbox" 
                                                name="status" 
                                                value="1" 
                                                id="flexCheckChecked{{ $questionItem->id }}" 
                                                {{ $questionItem->status == 1 ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <label class="form-check-label" for="flexCheckChecked{{ $questionItem->id }}">
                                                Include in Evaluation Form
                                            </label>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm view-more" 
                                            data-toggle="modal" data-target="#exampleModal" 
                                            data-id="{{ $questionItem->id }}"
                                            data-points="{{ $questionItem->points }}" 
                                            data-question="{{ $questionItem->question }}" 
                                            data-type="{{ $questionItem->type }}">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination Links -->
                <div class="d-flex justify-content-end">
                    {{ $questionItems->links() }}
                </div>
                
            </div>
        </div>
    </div>


    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add New Evaluation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.questionnaire.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="organizationName">Question</label>
                            <input type="text" class="form-control" name="question" id="question"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Points</label>
                            <input type="text" class="form-control" name="points" id="points"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Type</label>
                            <select class="form-control" name="type" id="type"
                                placeholder="">
                                <option value=""hidden>Select type</option>
                                <option value="Attendance">Attendance</option>
                                <option value="Punctuality">Punctuality</option>
                                <option value="Initiative">Initiative</option>
                                <option value="Ability to Plan Activities">Ability to Plan Activities</option>
                                <option value="Interest and attitudes towards work
                                ">Interest and attitudes towards work</option>
                                <option value="Major Field of Concentration">Major Field of Concentration</option>
                                <option value="Appearance">Appearance</option>
                                <option value="Alertness">Alertness</option>
                                <option value="Self-Confidence">Self-Confidence</option>
                            </select>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
        </div>
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
                <form action="{{ route('admin.questionnaire.update', $questionItem->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <input type="text" name="id" class="form-control" id="modalId" value="{{  $questionItem->id }}" readonly>
                            <label for="modalFullName" class="text-dark">Evaluation</label>
                            <input type="text" name="question" class="form-control" id="modalQuestion" value="{{  $questionItem->question }}">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="modalCourse" class="text-dark">Points</label>
                            <input type="text" name="points" class="form-control" id="modalCourse" value="{{  $questionItem->points }}">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="modalAssignedTo" class="text-dark">Type</label>
                            <select class="form-control" name="type" id="modalType">
                                <option value="" hidden>{{  $questionItem->type }}</option>
                                <option value="Attendance">Attendance</option>
                                <option value="Punctuality">Punctuality</option>
                                <option value="Initiative">Initiative</option>
                                <option value="Ability to Plan Activities">Ability to Plan Activities</option>
                                <option value="Cooperation">Cooperation</option>
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



<script>
 $(document).ready(function() {
    function updateStatus(checkbox) {
        var status = checkbox.checked ? 1 : 0;
        var itemId = $(checkbox).data('id');
        console.log("Status to update:", status);
        console.log("Item ID:", itemId);

        // Test AJAX call
        $.ajax({
            url: `/update_status/${itemId}`,
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}', // Laravel CSRF token
                status: status
            },
            success: function(response) {
                alert(status ? 'Item included in Evaluation Form.' : 'Item removed from Evaluation Form.');
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
                alert('Error updating status.');
            }
        });
    }

    // Checkbox change event
    $('.form-check-input').on('change', function() {
        updateStatus(this);
    });

    $('.view-more').on('click', function() {
        // Get the data attributes from the clicked button
        var id = $(this).data('id');
        var question = $(this).data('question');
        var type = $(this).data('type');
        var points = $(this).data('points');

        // Populate the modal input fields
        $('#modalId').val(id);
        $('#modalQuestion').val(question);
        $('#modalType').val(type);
        $('#modalPoints').val(points);

        // Update the form action with the correct student ID
        var formAction = "{{ route('admin.questionnaire.update', ':id') }}";
        formAction = formAction.replace(':id', id);
        $('#exampleModal form').attr('action', formAction);
    });
});


    </script>
@endsection
<!-- Load jQuery from CDN -->

    