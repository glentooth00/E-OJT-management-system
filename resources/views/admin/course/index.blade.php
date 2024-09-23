@extends('includes.layouts.app')

@section('page-title', 'School Year')

@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Course</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal"> Add Course</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($courses as $course) --}}
                            <tr>
                                <td>
                                    {{-- {{ $schoolYear->school_year }} --}}
                                </td>
                            </tr>
                        {{-- @endforeach --}}
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
                    <h5 class="modal-title" id="addAgencyModalLabel">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.course.store') }}" method="POST">
                        @csrf {{-- CSRF protection --}}
                        <div class="form-group">
                            <label for="school_year">Course</label>
                            <input type="text" class="form-control" name="course" id="course"
                                placeholder="School Year">
                        </div>
                        <div class="form-group">
                            <label for="school_year">Course code</label>
                            <input type="text" class="form-control" name="course_code" id="course"
                                placeholder="School Year">
                        </div>
                        <div class="form-group">
                            <label for="school_year">Course initials</label>
                            <input type="text" class="form-control" name="course" id="course_initials"
                                placeholder="School Year">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"
                        onclick="event.preventDefault(); document.querySelector('#addAgencyModal form').submit();">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!---Container Fluid-->
@endsection
