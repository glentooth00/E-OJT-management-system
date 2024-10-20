@extends('includes.layouts.department')

@section('page-title', 'Documents')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@section('content')
<button class="btn btn-secondary ml-2" onclick="goBack()">Back</button>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Left Section (Profile Picture, About) -->
            <div class="card">
                <div class="card-body text-center">
                    <!-- Apply img-fluid and rounded-circle to make the image responsive and round -->
                    <img src="/storage/{{ $student->id_attachment }}" class="img-fluid rounded-circle pb-3" alt="Avatar" style="max-width: 150px; height: auto;">
                    <h4>{{ $student->fullname }}</h4>
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
                            <input type="text" class="form-control" value="{{ $student->fullname }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $student->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Course & Year</label>
                            <input type="text" class="form-control" value="{{ $student->course }} {{ $student->year_level }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" value="{{ $student->department }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" value="{{ $student->address }}" readonly>
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{ $student->id }}">
                                View Documents
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!-- Tab Links -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="good-moral-tab" data-bs-toggle="tab" href="#good-moral" role="tab" aria-controls="good-moral" aria-selected="true">Good Moral</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="consent-tab" data-bs-toggle="tab" href="#consent" role="tab" aria-controls="consent" aria-selected="false">Letter of Consent</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="letter-tab" data-bs-toggle="tab" href="#letter" role="tab" aria-controls="letter" aria-selected="false">Letter</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="moa-tab" data-bs-toggle="tab" href="#moa" role="tab" aria-controls="moa" aria-selected="false">Moa</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="endorsement-tab" data-bs-toggle="tab" href="#endorsement" role="tab" aria-controls="endorsement" aria-selected="false">Endorsement Letter</a>
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="tab-content mt-3" id="myTabContent">
                <!-- Good Moral Image -->
                @foreach ($documents as $document)
                    <div class="tab-pane fade" id="good-moral" role="tabpanel" aria-labelledby="good-moral-tab">
                        <img src="{{ Storage::url($document->good_moral) }}" class="img-fluid" alt="Good Moral Document">
                    </div>

                    <!-- Letter of Consent Image -->
                    <div class="tab-pane fade" id="consent" role="tabpanel" aria-labelledby="consent-tab">
                        <img src="{{ Storage::url($document->letter) }}" class="img-fluid" alt="Letter of Consent Document">
                    </div>

                    <!-- Letter Image -->
                    <div class="tab-pane fade" id="letter" role="tabpanel" aria-labelledby="letter-tab">
                        <img src="{{ Storage::url($document->consent) }}" class="img-fluid" alt="Letter Document">
                    </div>

            @endforeach
                
                <!-- Moa Image -->
                <div class="tab-pane fade" id="moa" role="tabpanel" aria-labelledby="moa-tab">
                    <img src="{{ asset($student->moa)}}" class="img-fluid" alt="Moa Document">
                </div>
                
                <!-- Endorsement Letter Image -->
                <div class="tab-pane fade" id="endorsement" role="tabpanel" aria-labelledby="endorsement-tab">
                    <img src="{{ asset($student->endorsement)}}" class="img-fluid" alt="Endorsement Letter Document">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
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
    .custom-avatar {
    max-width: 300px; /* Set the maximum width */
    height: auto;     /* Maintain aspect ratio */
    border-radius: 50%; /* Optional: make it circular */
}
</style>
<script>
    function goBack() {
        window.history.back();
    }
    </script