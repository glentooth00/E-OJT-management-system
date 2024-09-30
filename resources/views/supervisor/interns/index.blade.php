@extends('includes.layouts.supervisor')

@section('page-title', 'Interns')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interns Daily Activities</h1>
        </div>
        <section class="mt-5">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th>Office assigned</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->fullname }}</td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->department }}</td>
                                <td>
                                    {{ $student->course }}
                                    @if (!empty($student->year_level))
                                        - {{ $student->year_level }}
                                    @endif  
                                </td>
                                <td>{{ $student->designation }}</td>
                                <td>
                                    @php
                                    // Check if there are any weekly reports uploaded
                                    $hasWeeklyReports = $student->weeklyReports->isNotEmpty();
                                
                                    // Check if any of the weekly reports has the status 'Approve'
                                    $isApproved = $hasWeeklyReports ? $student->weeklyReports->contains('status', 'Approved') : false;
                                @endphp
                                
                                @if (!$hasWeeklyReports)
                                    <!-- Display message if no activity has been uploaded -->
                                    <label class="badge badge-danger p-2 btn-sm">No Activity Uploaded</label>
                                @elseif (!$isApproved)
                                    <!-- Display Approved badge if at least one report is approved -->
                                      <label class="badge badge-warning p-2 btn-sm">Pending</label>
                                @else
                                    <!-- Display Pending badge if reports exist but none are approved -->
                                  
                                    <label class="badge badge-success p-2 btn-sm">Approved</label>
                                @endif
                                
                                </td>
                                <td>

                                    @if (!$hasWeeklyReports)
                                    <!-- Display message if no activity has been uploaded -->
                                  
                                    @elseif ($isApproved)
                                        <!-- Display Approved badge if at least one report is approved -->
                                        <a href="{{ route('supervisor.interns.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                    @else
                                        <!-- Display Pending badge if reports exist but none are approved -->
                                        <form action="{{ route('supervisor.interns.approve', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>
                                        <a href="{{ route('supervisor.interns.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                    @endif

                                   
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
