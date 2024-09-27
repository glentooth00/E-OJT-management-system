@extends('includes.layouts.students')

@section('content')
    <div class="container">
        @if ($weeklyReports->isEmpty())
            <p>No weekly reports available for this week.</p>
        @else
            <h1>Weekly Report for Week {{ $weekNumber }}</h1>
            <div class="row mb-4">
                <div class="col-md-12">
                    <p><strong>Description:</strong> {{ $weeklyReports[0]->activity_description }}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($weeklyReports as $report)
                    @if ($report->student_id == auth()->user()->id)
                        <div class="col-md-4 mb-3" style="flex: 0 1 200px; max-width: 200px; height: 200px; overflow: hidden; position: relative; cursor: pointer;">
                            <img src="{{ asset('storage/' . $report->file_path) }}" class="img-fluid" alt="Activity Photo">
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>
@endsection
