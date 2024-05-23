@extends('includes.layouts.app')


@section('content')
    <!-- Container Fluid-->
    <div class="container">
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
    </div>


    <!---Container Fluid-->
@endsection
