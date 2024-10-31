@extends('includes.layouts.department')

@section('page-title', 'Documents')

@section('content')

<div class="card m-4">
    <!-- Card Header -->
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Interns</h6>
    </div>

    <!-- Card Body with Table -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 10%;">Name</th>
                        <th>Course / Year Level</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->course }} - {{ $student->year_level }}</td>
                        <td>{{ $student->department }}</td>
                        <td>{{ $student->designation }}</td>
                        <td>
                            <a href="{{ route('department_head.document.show', $student->id) }}" class="btn btn-outline-primary btn-sm" id="{{ $student->id }}">View</a>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <!-- Pagination Links -->
<div class="d-flex justify-content-between mt-3">
    <div>
        {{ $students->links('vendor.pagination.bootstrap-4') }} <!-- Use custom pagination view -->
    </div>
    <div class="mt-2">
        <!-- Display pagination info below the pagination links -->
        Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} results
    </div>
</div>
    </div>
</div>



@endsection
