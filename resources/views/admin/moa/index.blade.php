@extends('includes.layouts.app')

@section('page-title', 'School Year')

@section('content')
<style>
    .custom-modal {
    max-width: 800px; /* Set the maximum width */
    width: 100%; /* Set the width to 100% for responsiveness */
}
</style>
    <!-- Container Fluid-->
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Memorandum of Agreement</h1>
                @if(session('success'))
                <div class="alert alert-success text-success">
                    {{ session('success') }}
                </div>
                @endif
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add MOA</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>MOA</th>
                            <th>MOA Name</th>
                            <th>MOA Course</th>
                            <th>MOA Status</th>
                            <th>Action</th> <!-- For viewing/downloading the file -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($moas as $moa)
                        <tr>
                            <td>
                                <a href="#" class="view-moa" data-toggle="modal" data-target="#exampleModal2" data-moa-file="{{ asset($moa->moa_file) }}">View MOA</a>
                            </td>
                            
                            
                            <td>{{ $moa->moa_name }}</td>
                            <td>{{ $moa->moa_course }}</td>
                            <td>{{ $moa->moa_status }}</td>
                            <td>
                                <!-- Optionally, a button to download the MOA file -->
                                <a href="{{ asset($moa->moa_file) }}" download="{{ $moa->moa_name }}">Download</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal  col-lg-10" role="document">
        <div class="modal-content" style="width: 100%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Memorandum of Agreement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <img id="moaFile" src="{{ asset($moa->moa_file) }}" class="col-lg-12" frameborder="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>





    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add Memorandum of Agreement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.moa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- CSRF protection --}}
                        <div class="form-group">
                            <label for="moa" class="badge text-dark">Memorandum of Agreement</label>
                            <input type="file" class="form-control" name="moa" id="moa" placeholder="Add memorandum of agreement">
                        </div>
                        <div class="form-group">
                            <label for="moa" class="badge text-dark">MOA name</label>
                            <input type="text" class="form-control" name="moa_name" id="moa" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="moa" class="badge text-dark">MOA Course</label>
                            <input type="text" class="form-control" name="moa_course" id="moa" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="moa" class="badge text-dark">MOA Status</label>
                            <select type="text" class="form-control" name="moa_status" id="moa" placeholder="">
                                <option value="" hidden>MOA Status</option>
                                <option value="Active">Active</option>
                                <option value="Deactivated">Deactivated</option>
                            </select>   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>                    
            </div>
        </div>
    </div>


    <!---Container Fluid-->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('.view-moa').on('click', function() {
            var moaFile = $(this).data('moa-file');
            $('#moaFile').attr('src', moaFile);
        });
    });
</script>

