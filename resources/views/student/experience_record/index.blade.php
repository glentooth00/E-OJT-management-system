@extends('includes.layouts.students')

@section('page-title', 'Student Dashboard')

@section('content')
    <!-- Container Fluid-->

    <div class="container-fluid mb-5">
        <h3>Experience Record</h3>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div>
                                <label for="">Description*</label>
                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-4 text-right">
                                <a href="/student/dashboard" class="btn btn-secondary">Cancel</a>
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Student ID:</h5>
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
                               <tr>
                                    <td>sedsdsad</td>
                                    <td>sedsdsad</td>
                                    <td>sedsdsad</td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!---Container Fluid-->
@endsection
