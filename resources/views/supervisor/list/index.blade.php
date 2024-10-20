@extends('includes.layouts.supervisor')

@section('page-title', 'Weekly Reports')

@section('content')
<style>
    .badge {
    font-size:12px; /* Adjust the size as needed */
}

</style>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Intern List</h1>
        </div>
        <form method="GET" action="{{ route('supervisor.list.index') }}" class="form-inline mb-3">
                <div class="input-group mr-2" style="flex: 1;">
                    <input type="text" name="search" class="form-control" placeholder="Search by full name" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            
                <div class="form-group mr-2" style="flex: 1;">
                    <label for="course" class="mr-2">Filter by Course:</label>
                    <select name="course" id="course" class="form-control" onchange="this.form.submit()">
                        <option value="">All Courses</option>
                        <option value="BSIT" {{ request('course') == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                        <option value="BSCS" {{ request('course') == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                    </select>
                </div>
            </form>
       <div class="row justify-content-start">
            <div class="col">
                {{-- <h1 class="mb-3">School year</h1> --}}
                {{-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add School
                    Year</button>--}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Interns</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex flex-wrap">
                                        @forelse ($students as $student)
                                        <div class="card m-2" style="width: 18rem; overflow: hidden;">
                                            <div class="img-container" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden; padding-top: 10px;">
                                                <img src="/storage/{{ $student->id_attachment }}" class="card-img-top" alt="..." style="max-height: 160%; max-width: 100%; object-fit: contain; border-radius: 20px;">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $student->fullname }}</b></h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">Course:</span>
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $student->course }}
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">Year Lvl:</span>
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $student->year_level }}
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">Department:</span>
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $student->department }}
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">Designation:</span>
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $student->designation }}
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">MOA:</span>
                                                    </div>
                                                    <div class="col-6">
                                                        @if(empty($student->moa))
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#a83232" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                            </svg>
                                                            <label class="badge badge-warning text-dark p-1" style="font-size: 11px;" for="">No MOA</label>
                                                        @else
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="#1c7430" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" stroke="#1c7430" stroke-width="1.5"/>
                                                                </svg>
                                                            <label class="badge badge-success text-dark  p-1" style="font-size: 11px;" for="">MOA attached</label>

                                                            </span>
                                                        @endif

                                                    </div>
                                                    <div class="col-6">
                                                        <span class="badge badge-light small-label">Endorsement Letter:</span>
                                                       
                                                    </div>
                                                    <div class="col-6">
                                                        @if(empty($student->endorsement))
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#a83232" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                            </svg>
                                                            <label class="badge badge-warning text-dark p-1" style="font-size: 11px;" for="">No letter</label>
                                                        @else
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="#1c7430" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" stroke="#1c7430" stroke-width="1.5"/>
                                                            </svg>
                                                            <label class="badge badge-success text-dark p-1" style="font-size: 11px; margin-left: 5px;" for="">attached</label>
                                                        </span>
                                                        
                                                        @endif

                                                    </div>
                                                </div>
                                                <br>
                                                <a href="{{ route('supervisor.interns.show', $student->id) }}" class="btn btn-primary btn-block">View Reports</a>
                                             




                                            </div>
                                        </div>
                                        @empty
                                            NO STUDENT FOUND
                                        @endforelse
                                        {{-- @foreach ($students as $student) --}}

                                        
                                        {{-- @endforeach --}}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
            </div>
        </div> 
    </div>


    <!-- Add Agency Modal -->
    {{--  <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form action="{{ route('department_head.school_year.store') }}" method="POST">
                    
                        @csrf {{-- CSRF protection --}}
                        {{-- <div class="form-group">
                            <label for="school_year">School Year</label>
                            <input type="text" class="form-control" name="school_year" id="school_year"
                                placeholder="School Year">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"
                        onclick="event.preventDefault(); document.querySelector('#addAgencyModal form').submit();">Save</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!---Container Fluid-->
@endsection
