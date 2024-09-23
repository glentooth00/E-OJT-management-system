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
                <h1 class="mb-3">Evaluation form</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Create Evaluation</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Evaluation</th>
                            <th>created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($questionItems as $questionItem)
                               <tr>
                                    <td>{{ $questionItem->question }}</td>
                                    <td>{{ $questionItem->points }}</td>
                                    <td>{{ $questionItem->type }}</td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                               </tr>
                        @endforeach --}}
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
                    <form action="{{ route('admin.evaluation.store') }}" method="post">
                        @csrf
                        <h4>Attendance</h4>
                        @foreach ($attendances as $attendance)
                            <div class="form-check">
                                <input class="form-check-input" 
                                    type="checkbox" 
                                    name="attendance{{ $loop->index+1 }}" 
                                    value="{{ $attendance->question }}" 
                                    id="flexCheckDefault_{{ $loop->index + 1 }}">
                                <label class="form-check-label" for="flexCheckDefault_{{ $loop->index + 1 }}">
                                    {{ $attendance->question }}
                                </label> -- {{$attendance->points }}
                                <input type="text" name="activitypoints{{ $loop->index + 1 }}" value="{{ $attendance->points }}" readonly>
                            </div>
                        @endforeach

                          {{-- <br>
                        <h4>Punctuality</h4>
                        @foreach ($punctualities as $punctuality)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=" {{ $punctuality->question }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{ $punctuality->question }}
                            </label> - {{ $punctuality->points }}
                            <input type="hidden" name="points" value="{{ $punctuality->points }}" readonly>
                          </div>
                        @endforeach

                        <br>
                        <h4>Initiative</h4>
                        @foreach ($initiatives as $initiative)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{  $initiative->question }}
                            </label> - {{  $initiative->points }}
                            <input type="hidden" name="points" value="{{  $initiative->points }}" readonly>
                          </div>
                        @endforeach

                        <br>
                        <h4>Initiative</h4>
                        @foreach ($activities as $activity)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{  $activity->question }}
                            </label> - {{  $activity->points }}
                            <input type="hidden" name="points" value="{{  $activity->points }}" readonly>
                          </div>
                        @endforeach --}}
                        {{-- <div class="form-group">
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
                        </div> --}}
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
