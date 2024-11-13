@extends('includes.layouts.department')

@section('page-title', 'Reports')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Reports</h1>

        <!-- Filter Form for Search and Course -->
        <div class="mb-4">
            <form action="{{ route('department_head.report.index') }}" method="GET" class="form-inline d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <!-- Course Filter -->
                    <label for="course" class="mr-2">Course:</label>
                    <select name="course" id="course" class="form-control mr-2">
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->course_initials }}" {{ request('course') == $course->course_initials ? 'selected' : '' }}>
                                {{ $course->course_initials }}
                            </option>
                        @endforeach
                    </select>
        
                    <!-- Year Level Filter -->
                    <label for="year_level" class="mr-2">Year Level:</label>
                    <select name="year_level" id="year_level" class="form-control mr-2">
                        <option value="">Select Year Level</option>
                        @foreach ($yearLevels as $yearLevel)
                            @php
                                $formattedYearLevel = $yearLevel->year_level . ' ' . $yearLevel->section;
                            @endphp
                            <option value="{{ $formattedYearLevel }}" {{ request('year_level') == $formattedYearLevel ? 'selected' : '' }}>
                                {{ $formattedYearLevel }}
                            </option>
                        @endforeach
                    </select>
        
                    <!-- Search Bar -->
                    <label for="search" class="mr-2">Search:</label>
                    <input type="text" name="search" id="search" class="form-control mr-2" placeholder="Search by Name, ID, Course" value="{{ request('search') }}">
        
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
        
                <!-- Print Button (aligned to the right) -->
                <a href="{{ route('department_head.reports.print', request()->query()) }}" class="btn btn-success mt-3 btn-print" target="_blank">Print All Data</a>
            </form>
        </div>

        <!-- Card Container for Students Table -->
        <div class="card print-table">
            
            <div class="card-body">
                <!-- Table for displaying students -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Student Name</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Course</th>
                            <th scope="col" class="text-center">Agency</th>
                            <th scope="col" class="text-center">Year Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-center">{{ $student->fullname }}</td>
                                <td class="text-center">{{ $student->id_number }}</td>
                                <td class="text-center">{{ $student->course }}</td>
                                <td class="text-center">{{ $student->designation }}</td>
                                <td class="text-center">{{ $student->year_level }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
<hr>
                <!-- Pagination and Page Info -->
                <div class="d-flex justify-content-between pt-4">
                    <!-- Displaying the range of results -->
                    <span>Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} results</span>
                    
                    <!-- Displaying page information (Current page and total pages) -->
                    <span>Page {{ $students->currentPage() }} of {{ $students->lastPage() }} pages</span>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-end pt-2">
                    {{ $students->links('pagination::simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Print-specific styling to hide unnecessary elements -->
    <style>
        @media print {
            /* Hide all content except the table */
            body * {
                display: none;
            }
            .print-table, .print-table table {
                display: block;
            }
            /* Ensure the table fills the entire page width */
            .print-table {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            /* Hide pagination and print button */
            .btn-print, .pagination {
                display: none;
            }
        }
    </style>
@endsection
