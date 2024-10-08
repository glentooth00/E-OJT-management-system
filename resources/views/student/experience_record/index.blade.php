@extends('includes.layouts.students')

@section('page-title', 'Student Dashboard')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid mb-5">
        <h3>Experience Record</h3>
        @if(session('success'))
        <div class="alert alert-success border-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
        <div class="row mt-5">

            <div class="col-md-4">
                <div class="card">

                    {{-- {{ $isloggedIn->status }} --}}

                    <form action="{{  route('student.experience.timeIn') }}" method="post" class="form p-2">
                        @csrf
                        <input type="hidden" value="{{ $studentDatas }}" name="student">
                        <input type="hidden" value="{{ $studentId }}" name="studentId">
                        <button type="submit" class="btn btn-success btn-lg btn-block">TIME IN</button>  
                    </form>

                    <br>
                    {{-- <button>TIME OUT</button> --}}
                    <div class="card-body">
                        {{-- <form action="{{ route('student.experience.update', ) }}" method="post"> --}}
                            @csrf
                            @method('PUT')
                            <div class="p-2">
                                Week no#
                                <input type="text" name="week_no" value="{{ $diffInWeek }}" class="form-control" readonly>
                            </div>
                            <div class="p-2">
                                <label for="">No. of Hours</label>
                                <input type="text" name="no_of_hours" class="form-control" id="">
                            </div>
                            <div class="p-2">
                                <label for="">Description*</label>
                                <textarea name="activities" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="/student/dashboard" class="btn btn-secondary">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Student ID:</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>WEEK NO.</th>
                                    <th>DESCRIPTION</th>
                                    <th>No. of Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                {{-- @forelse ($experiences as $experience)
                                <tr>
                                    <td>{{ $experience->week_no }}</td>
                                    <td>{{ $experience->activities }}</td>
                                    <td>{{ $experience->no_of_hours }}</td>
                                </tr>
                                @empty
                                    
                                @endforelse --}}
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!---Container Fluid-->
@endsection
<script>
    // Make the alert disappear after 5 seconds
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none'; // Hide the alert
        }
    }, 5000); // 5000 milliseconds = 5 seconds
</script>