@extends('includes.layouts.app')


@section('page-title', 'STUDENT VIEW')

@section('content')

    <!-- Container Fluid-->
    {{-- <div class="container">
        <div id="accordion">
            @foreach ($school_years as $school_year)
                @php
                    $collapseId = 'collapse' . str_replace('-', '', $school_year->school_year);
                    $headingId = 'heading' . str_replace('-', '', $school_year->school_year);
                @endphp
                <div class="card">
                    <div class="card-header" id="{{ $headingId }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#{{ $collapseId }}"
                                aria-expanded="true" aria-controls="{{ $collapseId }}">
                                {{ $school_year->school_year }}
                            </button>
                        </h5>
                    </div>

                    <div id="{{ $collapseId }}" class="collapse" aria-labelledby="{{ $headingId }}"
                        data-parent="#accordion">
                        <div class="card-body">
                            @php
                                $studentsForYear = $students->where('school_year', $school_year->school_year);
                            @endphp
                            @if ($studentsForYear->isEmpty())
                                <p class="bg-warning p-2">No students found for this school year.</p>
                            @else
                                <ul>
                                    @foreach ($studentsForYear as $student)
                                        <li>{{ $student->fullname }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}


    @extends('includes.layouts.app')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Archive</h1>
        </div>
        <div id="accordion">
            @foreach ($school_years as $school_year)
                @php
                    $collapseYearId = 'collapse' . str_replace('-', '', $school_year->school_year);
                    $headingYearId = 'heading' . str_replace('-', '', $school_year->school_year);
                @endphp
                <div class="card">
                    <div class="card-header" id="{{ $headingYearId }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#{{ $collapseYearId }}"
                                aria-expanded="true" aria-controls="{{ $collapseYearId }}">
                                {{ $school_year->school_year }}
                            </button>
                        </h5>
                    </div>

                    <div id="{{ $collapseYearId }}" class="collapse" aria-labelledby="{{ $headingYearId }}"
                        data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                @foreach (['BSIT', 'BSCS'] as $course)
                                    @php
                                        $collapseCourseId =
                                            'collapse' . $course . str_replace('-', '', $school_year->school_year);
                                        $headingCourseId =
                                            'heading' . $course . str_replace('-', '', $school_year->school_year);
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header" id="{{ $headingCourseId }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link text-dark" data-toggle="collapse"
                                                        data-target="#{{ $collapseCourseId }}" aria-expanded="true"
                                                        aria-controls="{{ $collapseCourseId }}">
                                                        {{ $course }}
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="{{ $collapseCourseId }}" class="collapse"
                                                aria-labelledby="{{ $headingCourseId }}"
                                                data-parent="#{{ $collapseYearId }}">
                                                <div class="card-body">
                                                    @php
                                                        $filteredStudents = $students
                                                            ->where('school_year', $school_year->school_year)
                                                            ->where('course', $course);
                                                    @endphp
                                                    @if ($filteredStudents->isEmpty())
                                                        <p>No students found for this course.</p>
                                                    @else
                                                        <ul>
                                                            @foreach ($filteredStudents as $student)
                                                                <li>
                                                                    <a
                                                                        href="{{ route('student.show', $student->id) }}">{{ $student->fullname }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!---Container Fluid-->
@endsection





<!---Container Fluid-->
@endsection
