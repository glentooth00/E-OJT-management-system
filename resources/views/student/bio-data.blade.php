@extends('includes.layouts.students')

@section('content')
    <!-- Container Fluid-->

    <div class="card mb-5">
        <div class="card-header text-center"><h2>BIO DATA</h2></div>
        <div class="card-body">
            <div>
                <div class="float-right">
                    <label for="">2x2 ID PICTURES</label>
                    <br>
                    <input type="file" class="btn btn-success">
                </div>
            </div>
            <br><br>
            <h4>Personal Information</h4>
            <div class="mt-5">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Cellphone Number</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Provincial Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Date of Birth</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Place of Birth</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Civil Status</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Citizenship</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="">Height</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-2 mt-4">
                            <label for="">Weight</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Religion</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Sex</label>
                            <select name="" class="form-control" id="">
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">Name of Husband or Wife</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">1. Name of Childred</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="">1. Date of Birth</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4 mt-4">
                        </div>
                        <div class="col-md-4">
                            <label for="">2. Name of Childred</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">2. Date of Birth</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Father's Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Occupation</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tel. No.</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Mother's Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Occupation</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Address</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tel. No.</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="">Language and Dialects you can speak or write</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="">Person/s to be contacted in case of emergency</label>
                            <input type="text" class="form-control">
                        </div>

                    </div>
                    <div class="mt-5 pb-5 float-right">
                        <input type="submit" class="btn btn-success btn-lg" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---Container Fluid-->
@endsection
