@extends('includes.layouts.app')

@section('page-title', 'School Year')

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
                <h1 class="mb-3">Year/Level</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add Year/Level</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Year/Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($yearLevels as $yearLevel)
                            <tr>
                                <td>
                                    {{ $yearLevel->year_level }} {{ $yearLevel->section }}
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
                    <h5 class="modal-title" id="addAgencyModalLabel">Add Year/Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.year_level.store') }}" method="POST">
                        @csrf {{-- CSRF protection --}}
                        <div class="form-group">
                            <label for="school_year">Year/Level</label>
                            <input type="text" class="form-control" name="year_level" id="school_year"
                                >
                        </div>
                        <div class="form-group">
                            <label for="school_year">Course</label>
                            <select type="text" class="form-control" name="course" id="school_year">
                                <option value="" hidden></option>
                                @foreach ($courses as $course)
                                        <option value="{{ $course->course_initials }}">{{ $course->course_initials }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="school_year">section</label>
                            <select type="text" class="form-control" name="section" id="school_year">
                                <option value="" hidden>Select section</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
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
