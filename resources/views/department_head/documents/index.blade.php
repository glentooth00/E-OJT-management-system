@extends('includes.layouts.department')


@section('page-title', 'Documents')

@section('content')

<div class="card">
    <!-- Card Header -->
    <div class="card-header d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Interns</h6>
        <!-- Optional Filter Form (currently commented out) -->
        {{-- 
        <form action="{{ route('admin.filterStudents', ['status' => 'pending']) }}" method="GET">
            <select name="filter" onchange="this.form.submit()">
                <option value="">All</option>
                <option value="registered" {{ $selectedFilter == 'registered' ? 'selected' : '' }}>Registered</option>
                <option value="pending" {{ $selectedFilter == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </form> 
        --}}
    </div>
</div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th style="width: 10%;">Name</th>
                    <th>Course / Year Lvl</th>
                    <th>Department</th>
                    <th>Desigantion</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                     <td>{{ $student->fullname }}</td>
                     <td>{{ $student->course }} -  {{ $student->year_level }}</td>
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




<!-- Pagination Links -->
{{-- <div class="d-flex justify-content-center">
    {{ $get_students->links() }} <!-- Pagination works here with multiple records -->
</div> --}}





@endsection

