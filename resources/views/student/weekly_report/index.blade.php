@extends('includes.layouts.students')

@section('page-title', 'Weekly Report')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid">
        <h1>Weekly Report</h1>
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

        <div class="card col-md-6">
            <div class="card-body">
                <form action="{{ route('weeklyReport.uploadImgs') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="studentId" value="{{ $studentId }}" name="student_id">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="studentname" id="studentName" value="{{ $studentName }}">
                    </div>
                    <div class="form-group">
                        <label for="weekNumber">Number of Week:</label>
                        <input type="number" class="form-control" id="weekNumber" name="week_number" required>
                    </div>
                    <div class="form-group">
                        <label for="activityPhotos">Activity Photos:</label>
                        <input type="file" class="form-control-file" id="activityPhotos" name="activityPhotos[]" accept="image/*"
                            multiple required>
                    </div>
                    <div class="form-group">
                        <label for="activityDescription">Activity Description:</label>
                        <textarea class="form-control" id="activityDescription" name="activityDescription" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
{{-- >>>>>>> NEW-UI-ALVIN --}}
            </div>
        </div>


    </div>

    <!---Container Fluid-->
@endsection
