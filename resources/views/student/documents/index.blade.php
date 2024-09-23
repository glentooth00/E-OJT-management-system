@extends('includes.layouts.students')

@section('page-title', 'Documents')

@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <h1>Documents</h1>
        @error('student_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @foreach ($get_students as $student)
            <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="studentId" value="{{ $studentId }}" name="student_id">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="studentname" id="studentName"
                        value="{{ $student->fullname }}">
                </div>
                <div class="form-group">
                    <label for="letter">Letter:</label>
                    <input type="file" class="form-control" id="letter" name="letter" required>
                </div>
                <div class="form-group">
                    <label for="good_moral">Good Moral:</label>
                    <input type="file" class="form-control" id="good_moral" name="good_moral" required>
                </div>
                <div class="form-group">
                    <label for="consent">Consent:</label>
                    <input type="file" class="form-control" id="consent" name="consent" required>
                </div>
                <div class="form-group">
                    <label for="remarks">Remarks:</label>
                    <textarea class="form-control" id="remarks" name="remarks" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endforeach



    </div>

    <!---Container Fluid-->
@endsection
