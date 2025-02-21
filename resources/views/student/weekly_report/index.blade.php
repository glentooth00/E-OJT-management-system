@extends('includes.layouts.students')

@section('page-title', 'Weekly Report')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid">
        <h1>Daily Logs</h1>
        @error('student_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
{{-- <<<<<<< HEAD

        <form action="{{ route('weeklyReport.uploadImgs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="studentId" value="{{ $studentId }}" name="student_id">
            <div class="form-group">
                {{-- <label for="studentName">Student Name:</label> 
                <input type="hidden" class="form-control" name="studentname" id="studentName" value="{{ $studentName }}">--}}

                <div class="card col-md-7">
                    <div class="card-body">
                        <form action="{{ route('weeklyReport.uploadImgs') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="studentId" value="{{ $studentId }}" name="student_id">
                            
                            <div class="form-row">
                                <!-- Student Name (Hidden) -->
                                <div class="form-group col-md-6">
                                    <input type="hidden" class="form-control" name="studentname" id="studentName" value="{{ $studentName }}">
                                </div>
                            </div>
                
                            <div class="form-row">
                                <!-- Week Number -->
                                <div class="form-group col-md-6">
                                    <label for="weekNumber">Number of Week:</label>
                                    <input type="number" class="form-control" id="weekNumber" name="week_number" value="{{ $weeksPassed }}" required readonly>
                                    {{-- <input type="number" class="form-control" id="weekNumber" name="week_number" value="" > --}}
                                </div>
                                
                                <!-- Day and Day No. -->
                                <div class="form-group col-md-3">
                                    <label for="day">Day</label>
                                    <select type="text" class="form-control" id="day" name="day" value="" required>
                                        <option value="" hidden>Select Day</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="day_no">Day no.</label>
                                    <select class="form-control" id="day_no" name="day_no" required>
                                        <option value="" hidden>Select Day # of activity</option>
                                        <option value="1">Day 1</option>
                                        <option value="2">Day 2</option>
                                        <option value="3">Day 3</option>
                                        <option value="4">Day 4</option>
                                        <option value="5">Day 5</option>
                                    </select>
                                </div>
                            </div>
                
                            <div class="form-row">
                                <!-- Activity Photos -->
                                <div class="form-group col-md-6">
                                    <label for="activityPhotos">Activity Photos:</label>
                                    <input type="file" class="form-control-file" id="activityPhotos" name="activityPhotos[]" accept="image/*" multiple required>
                                </div>
                            </div>
                
                            <div class="form-row">
                                <!-- Activity Description -->
                                <div class="form-group col-md-12">
                                    <label for="activityDescription">Activity Description:</label>
                                    <textarea class="form-control" id="activityDescription" name="activityDescription" rows="4" required></textarea>
                                </div>
                            </div>
                
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                
</

    </div>

    <!---Container Fluid-->
@endsection
