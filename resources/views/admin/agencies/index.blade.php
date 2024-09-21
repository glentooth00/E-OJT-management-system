@extends('includes.layouts.app')

@section('page-title', 'Agency')

@section('content')
    <!-- Container Fluid-->
    <div class="container">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Agency</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add New
                    Agency</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Agency</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Supervisor</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agencies as $agency)
                            <tr>
                                <td>{{ $agency->agency_name }}</td>
                                <td>{{ $agency->agency_email }}</td>
                                <td>{{ $agency->agency_contact }}</td>
                                <td>{{ $agency->agency_supervisor }}`</td>
                                <td>{{ $agency->status }}</td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button></button>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
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
                    <h5 class="modal-title" id="addAgencyModalLabel">Add New Agency</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.agency.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="organizationName">Agency</label>
                            <input type="text" class="form-control" name="agency_name" id="organizationName"
                                placeholder="Agency Name">
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Email</label>
                            <input type="text" class="form-control" name="agency_email" id="organizationName"
                                placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Contact</label>
                            <input type="text" class="form-control" name="agency_contact" id="organizationName"
                                placeholder="contact">
                        </div>
                        <div class="form-group">
                            <label for="organizationName">Supervisor</label>
                            <input type="text" class="form-control" name="agency_supervisor" id="organizationName"
                                placeholder="Supervisor">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="Active" class="form-control" name="status" id="organizationName"
                                placeholder="status" readonly>
                        </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Agency</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
