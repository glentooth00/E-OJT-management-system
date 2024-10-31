<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/css/bootstrap/css/bootstrap.min.css">
    <style>
        h1 {
            font-size: 4rem;
            font-weight: 900 !important;
        }

        .btn {
            padding: 30px;
        }

        a {
            font-size: 25px !important;
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
                <div class="col-lg-8 mt-5 pt-5 text-center">
                    <img src="/admin/images/logo.png" width="500" class="img-fluid" alt="">
                    <div class="mt-5">
                        <h1>E-OJT MANAGEMENT SYSTEM</h1>
                    </div>
                    <!-- Display success message -->

                </div>
                <div class="col-lg-4 pt-5 btns" style="background-color: #4267B2;">
                    <div class="">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success mt-3" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="{{ route('admin.login') }}"
                                class="btn btn-outline-light btn-lg btn-block mt-5">OJT SUPERVISOR</a>

                            <a href="{{ route('department-login') }}"
                                class="btn btn-outline-light btn-lg btn-block mt-5">CHAIRPERSON</a>

                            <a href="{{ route('supervisor-login') }}"
                                class="btn btn-outline-light btn-lg btn-block mt-5">AGENCY SUPERVISOR</a>

                            <a href="{{ route('student-login') }}"
                                class="btn btn-outline-light btn-lg btn-block mt-5">STUDENT</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>
