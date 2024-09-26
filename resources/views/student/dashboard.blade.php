@extends('includes.layouts.students')

@section('page-title', 'Student Dashboard')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid mb-5">
        <h3>Student Dashboard</h3>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h5>Student ID: {{ $studentId }}</h5> --}}
                    </div>
                    <div class="card-body">
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
                                                class="btn btn-primary btn-sm">View</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12 mt-5 pt-5">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><b>VISION</b></h3>
                            </div>
                            <div class="card-body text-center">
                                <h4>
                                    " A globally competitive State University in Asia."
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><b>MISSION</b></h3>
                            </div>
                            <div class="card-body text-center">
                                <h4>
                                    " Human resources development through quality and relevant education,
                                    environment-friendly modern technologies and preservation of Filipino values and cuture
                                    for sustainable and improvement quality of life"
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><b>GOALS</b></h3>
                            </div>
                            <div class="card-body">
                                <h5>
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>The University shall have the following goals:</b>
                                </h5>
                                <ol class="mt-3">
                                    <li>
                                        <h5>
                                            Produce human capital imbued with scientific and technological skills endown
                                            with desirable values and work ethics;
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            Provide quality education in the fields of industries, agriculture, fishiries,
                                            technology, science, education and other relevant undergraduates and graduate
                                            programs;
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            Establish a university research culture responsive to community and global;
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            Enhance research-based extension programs and transfer of sustainable
                                            technologies;
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            Maximize productivity through efficient and effective resources management;
                                        </h5>
                                    </li>
                                    <li>
                                        <h5>
                                            Strengthen linkages with local, national and international partner-agencies.
                                        </h5>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!---Container Fluid-->
@endsection
