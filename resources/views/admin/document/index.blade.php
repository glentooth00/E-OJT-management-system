@extends('includes.layouts.app')

@section('page-title', 'Upload Documents')

@section('content')
<div class="container-fluid" style="padding-left: 20; padding-top: 0;">

    <div class="col-md-6">
            <h1 class="mt-4">Upload Required Documents</h1>
        <br>
    <!-- Form for uploading documents -->
    {{-- {{ route('documents.uploadMultiple') }} --}}
    <form action="{{ route('documents.uploadMultiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Upload Good Moral Document -->
        <div class="form-group">
            <label for="good_moral" class="badge text-black">Good Moral Certificate:</label>
            <input type="file" class="form-control" id="good_moral" name="good_moral" accept="image/*" required>
        </div>
        @error('good_moral')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <!-- Upload Endorsement Letter Document -->
        <div class="form-group mt-3">
            <label for="endorsement_letter" class="badge text-black">Endorsement Letter:</label>
            <input type="file" class="form-control" id="endorsement_letter" name="endorsement_letter" accept="image/*" required>
        </div>
        @error('endorsement_letter')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <!-- Upload Letter of Consent Document -->
        <div class="form-group mt-3">
            <label for="letter_of_consent" class="badge text-black">Letter of Consent:</label>
            <input type="file" class="form-control" id="letter_of_consent" name="letter_of_consent" accept="image/*" required>
        </div>
        @error('letter_of_consent')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-4">Upload Documents</button>
    </form>
    </div>


</div>
@endsection
