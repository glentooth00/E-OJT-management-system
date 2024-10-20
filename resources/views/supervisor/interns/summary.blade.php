@extends('includes.layouts.supervisor')


@section('page-title', 'Reports')

@section('content')
<style>
    .card-img-top {
        height: 200px; /* Set a fixed height */
        object-fit: cover; /* Ensures the image covers the area without stretching */
    }
</style>

<div class="container">
    <div class="row">
        @foreach ($activity_logs as $activity_log)
            <div class="col-md-3 mb-4"> <!-- Use col-md-3 for 4 cards per row -->
                <div class="card box-shadow">
                    {{-- Display the week number and day --}}
                    <label class="p-2 mr-2 pt-4" style="font-size: 15px;">
                        <b>Week no. {{ $activity_log->week_number }} - {{ ucfirst($activity_log->day) }} - Day {{ $activity_log->day_no }}</b>
                        <hr>
                    </label>
         
                    {{-- Placeholder image or actual image if available --}}
                    <img class="card-img-top p-3" src="{{ asset('storage/'.$activity_log->file_path) }}" alt="Card image cap">
                    
                    <div class="card-body">
                        
                        {{-- Description or any relevant text for the activity --}}
                        <p class="card-text">{{ $activity_log->description }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{-- {{ route('department_head.weekly_reports.view',[ $activity_log->student_id, $activity_log->week_number, $activity_log->day ]) }} --}}
                                <a href="{{ route('supervisor.interns.view',[ $activity_log->student_id, $activity_log->week_number, $activity_log->day ]) }} " type="button" class="btn btn-sm btn-outline-primary">View</a>
                                {{-- Uncomment if you want to add edit functionality --}}
                                {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                            </div>
            
                            {{-- Display time (you can format this based on your requirements) --}}
                            <small class="text-muted">{{ \Carbon\Carbon::parse($activity_log->created_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($pending_logs->isNotEmpty())
        @php
            $first_pending_log = $pending_logs->first();
        @endphp

        <div class="col-md-3 mb-4"> <!-- Use col-md-3 for 4 cards per row -->
            <div class="card box-shadow">
                <div class="card-header">
                    <label class="p-2" style="font-size: 15px;">
                        <b>Week no. {{ $first_pending_log->week_number }} - {{ ucfirst($first_pending_log->day) }} - Day {{ $first_pending_log->day_no }}</b>
                    </label>
                </div>

                <!-- Display only the first image as a Bootstrap thumbnail -->
                <img class="card-img-top img-thumbnail p-3" src="{{ asset('storage/'.$first_pending_log->file_path) }}" alt="Pending Activity Thumbnail">
                
                <div class="card-body">
                    <p class="card-text">{{ $first_pending_log->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('supervisor.interns.view', [ $first_pending_log->student_id, $first_pending_log->week_number, $first_pending_log->day ]) }}" type="button" class="btn btn-sm btn-outline-primary">View</a>
                            <!-- Add a "Pending" label beside the View button with centered text -->
                            <span class="badge badge-warning ml-2" style="padding:15px; font-size: 10px;">Pending</span>
                        </div>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($first_pending_log->created_at)->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>No pending activity logs available.</p>
    @endif
        
    </div>

    <div class="row">
    
    </div>
    
    

    <a href="javascript:void(0);" class="btn btn-secondary" onclick="goBack()">Back to Dashboard</a>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
</div>

@endsection



