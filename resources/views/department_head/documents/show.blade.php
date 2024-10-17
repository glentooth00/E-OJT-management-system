@extends('includes.layouts.department')

@section('page-title', 'Documents')

@section('content')
<button class="btn btn-secondary ml-2" onclick="goBack()">Back</button>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Left Section (Profile Picture, About) -->
            <div class="card">
                <div class="card-body text-center">
                     <img src="/storage/{{ $student->id_attachment }}" alt="Avatar">
                    <h4>john Wick</h4>
                    <p>wick@gmail.com</p>
                    <h5>About</h5>
                    <p>No information available</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <!-- Right Section (Personal Details Form) -->
            <div class="card">
                <div class="card-body">
                    <h5>Personal Details</h5>
                    <form>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" value="john Wick" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="wick@gmail.com" readonly>
                        </div>
                        <div class="form-group">
                            <label>Course & Year</label>
                            <input type="text" class="form-control" value="BSCS 4th yr A" readonly>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" value="CICS" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" value="Brgy Bayuyan Estancia Iloilo" readonly>
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn btn-primary">Edit Address</button>
                            <button type="button" class="btn btn-danger">Delete Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .profile-pic {
        width: 100%;
        max-width: 200px; /* Increase max-width for a larger profile picture */
        height: auto;     /* Maintain aspect ratio */
        object-fit: cover; /* Ensure the image covers the space */
        border-radius: 50%; /* Circular image */
    }
    .container {
        margin-top: 30px;
    }
    .buttons {
        margin-top: 10px;
    }
    .card {
        padding: 20px; /* Add padding to the card */
    }
</style>
<script>
    function goBack() {
        window.history.back();
    }
    </script