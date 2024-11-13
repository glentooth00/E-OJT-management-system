@extends('includes.layouts.app')

@section('page-title', 'Endorsement letter')

@section('content')
    <!-- Container Fluid-->

    <div class="container">
        @if(session('success'))
    <div class="alert alert-success text-success">
        {{ session('success') }}
    </div>
    @endif

        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Endorsement Letter</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Upload Endorsement letter</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Letter</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($letters as $letter)
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm view-letter" 
                                        data-toggle="modal" data-target="#letterModal" 
                                        data-letter="{{ asset($letter->letter) }}">
                                    View Letter
                                </button>
                            </td>
                            <td>{{ $letter->letter_course }}</td>
                            <td>{{ $letter->letter_status }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Delete</button>
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
                    <h5 class="modal-title" id="addAgencyModalLabel">Upload Endorsement letter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.endorsement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="letter">Letter</label>
                            <input type="file" class="form-control" name="letter" id="letter" required>
                        </div>
                        <div class="form-group">
                            <label for="letter_course">Course</label>
                            <input type="text" class="form-control" name="letter_course" id="letter_course" required>
                        </div>
                        <div class="form-group">
                            <label for="letter_status">Status</label>
                            <select class="form-control" name="letter_status" id="letter_status" required>
                                <option value="" hidden>Select status</option>
                                <option value="Active">Active</option>
                                <option value="Deactivated">Deactivated</option>
                            </select>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</div>
    <!---Container Fluid-->

<!-- Modal -->
<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">View Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Image will be displayed here -->
                <img id="letterImage" src="{{ asset($letter->letter ?? '') }}"" class="img-fluid" alt="Letter" style="max-height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function updateStatus(checkbox) {
        var status = checkbox.checked ? 1 : 0;
        var itemId = $(checkbox).data('id');
    
        $.ajax({
            url: '/update-status/' + itemId,
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                status: status
            },
            success: function(response) {
                alert('Item has been included to Evaluation form.');
            },
            error: function(xhr) {
                alert('Item has been removed.');
            }
        });
    }


    $(document).ready(function() {
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
        //  var formAction = "{{ route('admin.questionnaire.update', ':id') }}";
        formAction = formAction.replace(':id', id);
        // $('form').attr('action', formAction);
        $('#exampleModal form').attr('action', formAction);

        
    });
});

$(document).ready(function() {
        $('.view-letter').on('click', function() {
            var letterUrl = $(this).data('letter'); // Get the URL of the letter from the data attribute
            $('#letterImage').attr('src', letterUrl); // Set the URL in the image tag
        });
    });


    </script>
    