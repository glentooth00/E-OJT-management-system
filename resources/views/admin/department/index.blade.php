@extends('includes.layouts.app')

@section('page-title', 'Add Department')

@section('content')
    <!-- Container Fluid-->
    <div class="container">

        @if(session('success'))
        <div class="alert alert-success text-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Departments</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add Department</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Departments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>
                                    {{ $department->department_name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add Departments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.department.store') }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="school_year">Department</label>
                            <input type="text" class="form-control" name="department_name" id="school_year"
                                placeholder="">
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
    </div>

    <!---Container Fluid-->
@endsection
