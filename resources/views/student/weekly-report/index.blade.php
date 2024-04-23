@extends('includes.layouts.students')


@section('content')
    <!-- Container Fluid-->

    <div class="container">
        <h1>WEEKLY REPORT</h1>

        <form action="{{ route('weeklyReport.uploadImgs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="number" class="form-control" id="weekNumber" value="{{ $studentId }}" name="student_id">
            <div class="form-group">
                <label for="weekNumber">Week Number:</label>
                <input type="number" class="form-control" id="weekNumber" name="weekNumber">
            </div>
            <div class="form-group">
                <label for="activityPhoto">Activity Photos:</label>
                <input type="file" class="form-control-file" id="activityPhoto" name="activityPhoto[]" multiple>
            </div>
            <div class="form-group">
                <label for="activityDescription">Activity Description:</label>
                <textarea class="form-control" id="activityDescription" name="activityDescription"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    </section>
    <!---Container Fluid-->
@endsection
