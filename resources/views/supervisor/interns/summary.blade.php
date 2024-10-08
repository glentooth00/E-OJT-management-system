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
    </div>

    <a href="javascript:void(0);" class="btn btn-secondary" onclick="goBack()">Back to Dashboard</a>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
</div>

@endsection



