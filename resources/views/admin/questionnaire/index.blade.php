@extends('includes.layouts.app')

@section('page-title', 'Evaluation')

@section('content')
    <!-- Container Fluid-->

    <div class="container">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Add Questionnaire</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add Question</button>
                <table class="table">
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
                                        <div class="form-check">
                                            @if ($questionItem->status ==1)
                                            <input class="form-check-input" type="checkbox" value="1" checked id="flexCheckChecked" data-id="{{ $questionItem->id }}" onchange="updateStatus(this)">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Include in Evaluation Form
                                            </label>
                                            @else
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" data-id="{{ $questionItem->id }}" onchange="updateStatus(this)">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Include in Evaluation Form
                                            </label>
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
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
                                <option value="Cooperation">Cooperation</option>
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
@endsection

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
    </script>
    