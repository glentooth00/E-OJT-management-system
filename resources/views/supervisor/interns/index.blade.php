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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->fullname}}</td>
                                    <td>{{ $student->course}}</td>
                                    <td>{{ $student->department}}aa</td>
                                    <td>
                                        {{ $student->course }}
                                        @if (empty($student->year_level))

                                        @else
                                            - {{ $student->year_level }}
                                        @endif  
                                    </td>
                                    <td>
                                        {{ $student->designation }}
                                    </td>
                                    <td>
                                        <form action="{{ route('supervisor.interns.approve', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>
                                        
                                        <a href="{{ route('supervisor.interns.show', $student->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                    {{-- <td>{{ $activitylog->id_number }}</td>
                                    <td>{{ $activitylog->department }}</td>
                                    <td>{{ $activitylog->course }}</td>
                                    <td>
                                    <a href="{{ route('supervisor.evaluation.evaluate', $intern->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-list"></i> Evaluate
                                    </a>  
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
