@extends('includes.layouts.students')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Week no. {{ $weeklyReport->week_number }}</div>

                    <div class="card-body">
                        <p>Date Submitted: {{ $weeklyReport->created_at->format('M d, Y') }}</p>
                        <p>{{ $weeklyReport->activity_description }}</p>

                        @if ($weeklyReport->images)
                            <div class="row">
                                @foreach ($weeklyReport->images as $image)
                                    <div class="col-md-4 mb-4">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Activity Image">
                                        <p>{{ asset('storage/' . $image) }}</p> <!-- Output image URL for debugging -->
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No images uploaded for this weekly report.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
