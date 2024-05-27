@extends('includes.layouts.app')

@section('page-title', 'STUDENT VIEW')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid p-2">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="weekly-logs-tab" data-bs-toggle="tab" data-bs-target="#weekly-logs"
                    type="button" role="tab" aria-controls="weekly-logs" aria-selected="false">Weekly Logs</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>{{ $student->fullname }}</h2>
                <p><strong>School Year:</strong> {{ $student->school_year }}</p>
                <p><strong>Course:</strong> {{ $student->course }}</p>
            </div>
            <div class="tab-pane fade p-2" id="weekly-logs" role="tabpanel" aria-labelledby="weekly-logs-tab">
                @include('archives.weeklyLogs')
            </div>
            <div class="tab-pane fade p-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p><strong>Phone:</strong> {{ $student->phone }}</p>
                <p><strong>Emergency Contact:</strong> {{ $student->emergency_contact }}</p>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
