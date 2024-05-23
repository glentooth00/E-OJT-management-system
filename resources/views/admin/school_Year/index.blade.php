@extends('includes.layouts.app')


@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">School year</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add School
                    Year</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>School year</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Your table data here --}}
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
                    <h5 class="modal-title" id="addAgencyModalLabel">Add School year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="school_year">School year</label>
                            <input type="text" class="form-control" name="school_year" id="school_year"
                                placeholder="school year">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
