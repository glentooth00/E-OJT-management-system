@extends('includes.layouts.students')

@section('content')
    <!-- Container Fluid-->
    {{-- <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ACTIVITIES of {{ $studentId }}</h1>
        </div>
        <section class="mt-5">

            <div class="card">
                <td></td>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Interns</h6>
                </div>
                <div class="table-responsive">

                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th>Student ID</th> <!-- Add this header -->
                                <!-- Other headers -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Display the student ID here -->
                                <!-- Other data rows -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div> --}}

    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="h3 mb-0 text-gray-800">ACTIVITIES </h1>
            </div>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add New
                Category</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Week no.</th>
                        <th>Activity description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($weeklyReports as $report)
                        <tr>
                            <td>
                                {{ $report->week_number }}
                            </td>
                            <td>
                                {{ $report->activity_description }}
                            </td>
                            <td>
                                <a href="{{ route('weekly-report.show', ['id' => $report->student_id]) }}"
                                    class="btn btn-primary">
                                    View Report
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
    </div>
    <!---Container Fluid-->
@endsection
