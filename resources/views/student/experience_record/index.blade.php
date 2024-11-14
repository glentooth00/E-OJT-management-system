@extends('includes.layouts.students')

@section('page-title', 'Student Dashboard')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid mb-5">
        <h3>Experience Record</h3>
        @if(session('success'))
        <div class="alert alert-success border-success text-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="row mt-5">

            <div class="col-md-4">
                <div class="card">
                    @if($isLoggedIn)
                    <form action="{{  $experience ?  route('student.experience.logOut', $experience->id) : '#' }}" method="post" class="form p-2">
                        @csrf
                        @method('PUT')
                       
                        <input type="hidden" value="{{ $studentDatas }}" name="student">
                        <input type="hidden" value="{{ $studentId }}" name="studentId">
                        <button type="submit" class="btn btn-warning btn-lg btn-block">Log-Out</button>  
                    </form>
                    @else
                    <form action="{{  route('student.experience.timeIn') }}" method="post" class="form p-2">
                        @csrf
                        <input type="hidden" value="{{ $studentDesignation }}" name="designation">
                        <input type="hidden" value="{{ $studentDatas }}" name="student">
                        <input type="hidden" value="{{ $studentId }}" name="studentId">
                        <button type="submit" class="btn btn-success btn-lg btn-block">TIME IN</button>  
                    </form>
                    @endif
                    {{-- <button>TIME OUT</button> --}}
                    <div class="card-body">
                        <form action="{{ $experience ? route('student.experience.update', $experience->id) : '#' }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="p-2">
                                <label class="badge">Week no.</label>
                                <input type="text" name="week_no" value="{{ $diffInWeek }}" class="form-control" readonly>
                            </div>
                            {{-- <div class="p-2">
                                <label class="badge">No. of Hours</label>
                                <input type="text" name="no_of_hours" class="form-control" id="">
                            </div> --}}
                            <div class="p-2">
                                <label class="badge">Description*</label>
                                <textarea name="activities" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="/student/dashboard" class="btn btn-secondary">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Submit" {{ $experience ? '' : 'disabled' }}>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Experience</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>WEEK NO.</th>
                                    <th>DESCRIPTION</th>
                                    <th>DATE</th>
                                    <th>TIME IN</th>
                                    <th>TIME OUT</th>
                                    <th>No. of Hours</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @forelse ($dailyExperiences as $experience)
                                <tr>

                                    <td>{{ $experience->week_no }}</td>
                                    <td>{{ $experience->activities }}</td>
                                    <td>{{ \Carbon\Carbon::parse($experience->date)->format('M-d-Y') }}</td>
                                    <td>{{  $experience->time_in  }}</td>
                                    <td>{{  $experience->time_out  }}</td>
                                    <td>{{ $experience->no_of_hours }}</td>
                                    <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-primary view-more" 
                                            data-toggle="modal" 
                                            data-target="#exampleModal"
                                            data-id="{{ $experience->id }}"
                                            data-week_no="{{ $experience->week_no }}"
                                            data-no_of_hours="{{ $experience->no_of_hours }}"
                                            data-activities="{{ $experience->activities }}">
                                            Edit
                                        </button>
                                      
                                      
                                      


                                        {{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td>
                                           <h3 class="border bg-warning p-1 border-danger text-light">NO STUDENT EXPERIENCE RECORD FOUND         </h3>
                                    </td>
                                </tr>
                                 
                                @endforelse
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="" method="post" id="edit-experience-form">
                        @csrf
                        @method('PUT')
                        <div class="p-2">
                            <label class="badge">Week no.</label>
                            <input type="text" name="week_no" class="form-control" readonly>
                        </div>
                        {{-- <div class="p-2">
                            <label class="badge">No. of Hours</label>
                            <input type="text" name="no_of_hours" class="form-control">
                        </div> --}}
                        <div class="p-2">
                            <label class="badge">Description*</label>
                            <textarea name="activities" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" class="btn btn-primary" onclick="document.getElementById('edit-experience-form').submit();">Update</button>
            </div>
        </div>
    </div>
</div>

  
  
  


    <!---Container Fluid-->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Make the alert disappear after 5 seconds
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none'; // Hide the alert
        }
    }, 5000); // 5000 milliseconds = 5 seconds

    $(document).on('click', '.view-more', function() {
    var id = $(this).data('id');
    var weekNo = $(this).data('week_no');
    var activities = $(this).data('activities');

    // Populate modal fields with the clicked experience's data
    $('#exampleModal').find('input[name="week_no"]').val(weekNo);
    $('#exampleModal').find('textarea[name="activities"]').val(activities);
    $('#exampleModal form').attr('action', '/student/experience/update/' + id); // Update form action
});


</script>