@extends('includes.layouts.students')

@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <h1>Student Dashboard</h1>
        <p>Student ID: {{ $studentId }}</p>

        <table class="table">
            <thead>
                <tr>
                    <th>WEEK NO.</th>
                    <th>DESCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weeklyReports as $weeklyReport)
                    <tr>
                        <td>{{ $weeklyReport->week_number }}</td>
                        <td>{{ $weeklyReport->activity_description }}</td>
                        <td>
                            {{-- <a href="{{ route('weeklyReport.show', $weeklyReport->id) }}" class="btn btn-primary">View</a> --}}
                            <a href="{{ route('weeklyReport.show', $weeklyReport->week_number, $weeklyReport->activity_description) }}"
                                class="btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <!---Container Fluid-->
@endsection
