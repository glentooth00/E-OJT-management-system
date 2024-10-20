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
                                <th>Attendance Status</th>
                                <th>Designation</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->fullname }}</td>
                                <td>
                                    @php
                                    // Get the latest experience record for the student
                                    $latestExperience = \App\Models\Experience::where('studentId', $student->id)
                                        ->orderBy('created_at', 'desc') // Order by created_at to get the latest entry
                                        ->first();
                                
                                    // Determine attendance status
                                    $status = $latestExperience ? $latestExperience->status : null;
                                
                                    // Initialize variables for time in and time out
                                    $timeIn = $latestExperience ? $latestExperience->time_in : 'No time in recorded';
                                    $timeOut = $latestExperience ? $latestExperience->time_out : 'No time out recorded';
                                @endphp
                                
                                <div>
                                    @if ($status == \App\Models\Student::STATUS_PENDING)
                                        <span class="badge badge-danger btn-sm p-2" style="font-size: 15px;">Pending</span>
                                    @elseif ($status == \App\Models\Student::STATUS_LOGGED_IN)
                                        <span class="badge badge-success p-2" style="font-size: 15px;">Logged In</span>
                                    @elseif ($status == \App\Models\Student::STATUS_LOGGED_OUT)
                                        <span class="badge badge-warning p-2" style="font-size: 15px;">Logged Out</span>
                                    @elseif ($status == 'Approved')
                                        <span class="badge badge-success p-2" style="font-size: 15px;">Approved</span>
                                    @else
                                        <span class="badge badge-secondary p-2" style="font-size: 15px;">No status available</span>
                                    @endif
                                </div>
                    
                                </td>
                                <td>{{ $student->designation }}</td>
                                <td>{{ $timeIn }}</td>
                                <td>{{ $timeOut }}</td>
                                <td>
                                    <div class="d-flex">
                                        @if ($status == STATUS_PENDING)
                                       
                                        <form action="{{ route('supervisor.approve_experience.approve', ['student_id' => $student->id, 'experience_id' => $latestExperience->id]) }}" method="POST" class="me-2">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-success mr-2">Approve</button>
                                        </form>
                            
                                    @endif
                                        
                                        {{-- @endif --}}
                    
                                        @if ($latestExperience) <!-- Check if $latestExperience is not null -->
                                        <a href="{{ route('supervisor.experience.view', ['student_id' => $student->id, 'experience_id' => $latestExperience->id]) }}" class="btn btn-sm btn-primary">View</a>
                                    @else
                                        <span class="text-muted">No experience records available</span> <!-- Optional message if no experience records -->
                                    @endif
                            
                                    </div>
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
