<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/css/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('admin/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('admin/css/style/style.css')}}" rel="stylesheet"> --}}
    <style>
        h1 {
            font-size: 4rem;
            font-weight: 900 !important;
        }

        .btns {
            padding-top: 70px !important;
            height: 100vh;
        }
    </style>
    <title>Index</title>
</head>

<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 mt-5 pt-5 text-center">
                    <img src="/admin/images/logo.png" width="400" class="img-fluid" alt="">
                    <div class="">
                        <h1>E-OJT MANAGEMENT SYSTEM</h1>
                    </div>
                </div>
                <div class="col-lg-7 pt-3 btns bg-primary">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-5">
                            <div class="text-header text-light text-center mb-4">
                                <h2>Registration</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="" class="text-white">Full Name</label>
                                    <input type="text" name="fullname" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-white">Attach your ID here</label>
                                    <input type="file" name="id_attachment" class="form-control">
                                </div>
                                {{-- <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div> --}}
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">ID number</label>
                                    <input type="text" name="id_number" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Course</label>
                                    <select name="course" id="" class="form-control">
                                        <option value="" hidden>Select Course </option>
                                        <option value="BSIT"> BSIT </option>
                                        <option value="BSCS"> BSCS </option>
                                        <option value="BEED"> BEED </option>
                                        <option value="CIVIL ENGINEERING"> CIVIL ENGINEERING </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Department</label>
                                    <select name="department" id="" class="form-control">
                                        <option value="" hidden>Select Department </option>
                                        <option value="CICS">CICS </option>
                                        <option value="EDUCTATION">EDUCTATION</option>
                                        <option value="ENGINEERING">ENGINEERING</option>
                                        <option value="TOURISM">TOURISM</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Contact Number</label>
                                    <input type="number" name="contact_number" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="text-white">Sex</label>
                                    <select name="sex" id="" class="form-control">
                                        <option value="">---- Select ----</option>
                                        <option value="MALE"> MALE </option>
                                        <option value="FEMALE"> FEMALE </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="schoolYear" class="text-white">School year</label>
                                    <select name="school_year" id="schoolYear" class="form-control">
                                        @foreach ($schoolYears as $schoolYear)
                                            <option value="{{ $schoolYear->school_year }}">
                                                {{ $schoolYear->school_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 float-right">
                                <a href="{{ route('site.index') }}" class="btn btn-secondary btn-lg mr-3">
                                    <i class="fas fa fa-arrow-left"></i> Back
                                </a>

                                <button type="submit" class="btn btn-success btn-lg"> Submit <i
                                        class="fas fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
