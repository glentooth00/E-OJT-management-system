@extends('includes.layouts.app')

@section('page-title', 'STUDENT VIEW')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Home</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Weekly Logs</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Documents</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-4" id="home" role="tabpanel" aria-labelledby="home-tab"
                style="color: rgb(32, 31, 31) !important; background-color:#fafdfb !important;">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4>{{ $student->id }}</h4> --}}
                        <h4>{{ $student->fullname }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>School Year:</strong> {{ $student->school_year }}</p>
                        <p><strong>Course:</strong> {{ $student->course }}</p>
                    </div>
                </div>
            </div>

            @foreach ($student_activities as $report)
                <div class="tab-pane fade p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                    style="color: rgb(32, 31, 31) !important; background-color:#fafdfb !important;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><b>Name:</b> {{ $student->studentname }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Date:</b> {{ \Carbon\Carbon::parse($report->created_at)->format('F j, Y') }}

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <p>Activity Photos:</p>
                                        <img style="width:80%;" src="{{ asset('storage/' . $report->file_path) }}"
                                            class="img-fluid" alt="Activity Photo">
                                        <hr>
                                        <h5><b>Number of Week: </b>{{ $report->week_number }}</h5>
                                        <hr>
                                    </div>
                                    <div class="card">
                                        <div class="card-header"><b>Activity Description</b></div>
                                        <div class="card-body">
                                            <p>{{ $report->activity_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="tab-pane fade p-4" id="contact" role="tabpanel" aria-labelledby="contact-tab"
                style="color: rgb(32, 31, 31) !important; background-color:#fafdfb !important;">
                <div class="card col-md-4">
                    <div class="card-body">
                        <h1>{{ $student->fullname }}</h1>
                        <hr>

                        <!-- Display student activities -->
                        {{-- <h2>Student Activities</h2>
                        <ul>
                            @foreach ($student_activities as $activity)
                                <li>{{ $activity->description }} ({{ $activity->created_at }})</li>
                            @endforeach
                        </ul> --}}

                        <!-- Display student documents -->
                        <h2>Student Documents</h2>
                        <ul>
                            @foreach ($student_documents as $document)
                                <li>
                                    <strong>Letter:</strong> <a href="#" data-toggle="modal"
                                        data-target="#letterModal{{ $document->id }}">View Letter</a><br>
                                    <strong>Good Moral:</strong> <a href="#" data-toggle="modal"
                                        data-target="#goodMoralModal{{ $document->id }}">View Good Moral</a><br>
                                    <strong>Consent:</strong> <a href="#" data-toggle="modal"
                                        data-target="#consentModal{{ $document->id }}">View Consent</a><br>
                                    <strong>Remarks:</strong> {{ $document->remarks }}
                                </li>
                            @endforeach
                        </ul>

                        <!-- Modals for each document -->
                        @foreach ($student_documents as $document)
                            <!-- Letter Modal -->
                            <div class="modal fade" id="letterModal{{ $document->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="letterModalLabel{{ $document->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="letterModalLabel{{ $document->id }}">Letter</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ Storage::url($document->letter) }}" class="img-fluid"
                                                alt="Letter">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Good Moral Modal -->
                            <div class="modal fade" id="goodMoralModal{{ $document->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="goodMoralModalLabel{{ $document->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="goodMoralModalLabel{{ $document->id }}">Good
                                                Moral</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ Storage::url($document->good_moral) }}" class="img-fluid"
                                                alt="Good Moral">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Consent Modal -->
                            <div class="modal fade" id="consentModal{{ $document->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="consentModalLabel{{ $document->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="consentModalLabel{{ $document->id }}">Consent
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ Storage::url($document->consent) }}" class="img-fluid"
                                                alt="Consent">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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


    </div>--}}
    
    <!---Container Fluid-->
@endsection
