<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/css/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('admin/css/style/style.css') }}" rel="stylesheet">
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
    <title>Admin Login</title>
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
                </div>
                <div class="col-lg-4 pt-5 btns" style="background-color: #4267B2;">
                    <a href="/site/index" class="btn btn-outline-light btn-lg">
                        <span class="bi bi-arrow-left"></span> Back
                    </a>

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="p-5">
                            <div class="text-header text-light text-center mb-5">
                                <h2>Login</h2>
                            </div>
                            <div>
                                <label for="email" class="text-light">Username</label>
                                <input type="text" id="username"
                                    class="form-control " name="username"
                                    value="{{ old('username') }}" required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="password" class="text-light">Password</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-4">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>
