@extends('includes.layouts.supervisor')

@section('page-title', 'Reports')

@section('content')

<div class="container">

    @if ($activity_logs->isEmpty())
        <p>No weekly reports available for this student.</p>
    @else
        <h1>Student Activity</h1>
        <div class="row mb-4">
            <div class="col-md-12">
                {{-- Flex container for student name and activity status --}}
                <div class="d-flex align-items-center">
                    <p class="mr-3">
                        <label class="badge p-2" style="font-size: 15px;">Student:</label> 
                        {{ $activity_logs[0]->studentname }}
                    </p>
                    
                    <p>
                        <label class="badge p-2" style="font-size: 15px;">Activity Status:</label> 
                        @if ($activity_logs[0]->status == 'Approved')
                            <span class="badge badge-success p-2">{{ $activity_logs[0]->status }}</span>
                        @else
                            <span class="badge badge-secondary p-2">{{ $activity_logs[0]->status }}</span>
                        @endif
                    </p>
                </div>
        
                {{-- Description below the name and status --}}
                <p class="mt-1">
                    <label class="badge p-2" style="font-size: 15px;">Description:</label> 
                    {{ $activity_logs[0]->activity_description }}
                </p>
            </div>
        </div>
        
        <div class="row">
            @foreach ($activity_logs as $report)
                {{-- Filter images based on day and day_no --}}
                @if ($report->day == $day && $report->day_no == $day_no)
                    <div class="col-md-4 mb-3" style="flex: 0 1 200px; max-width: 200px; height: 200px; overflow: hidden; position: relative; cursor: pointer;">
                        <img src="{{ asset('storage/' . $report->file_path) }}" class="img-fluid" alt="Activity Photo">
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <a href="javascript:void(0);" class="btn btn-secondary" onclick="goBack()">Back to Dashboard</a>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    

</div>

@endsection
