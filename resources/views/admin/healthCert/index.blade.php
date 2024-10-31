@extends('includes.layouts.app')

@section('page-title', 'Upload Documents')

@section('content')
<div class="container-fluid" style="padding-left: 20; padding-top: 0;">

    <div class="col-md-6">
            <h1 class="mt-4">Upload Health Certificate</h1>
        <br>
        @if (session('success'))
    <div class="alert alert-success text-dark">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger text-dark">
        {{ session('error') }}
    </div>
@endif

    <!-- Form for uploading documents -->
    {{-- {{ route('documents.uploadMultiple') }} --}}
    <form action="{{ route('documents.uploadHealthCertificate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Upload Health Certificate Document -->
        <div class="form-group">
            <label for="health_certificate" class="badge text-black">Health Certificate:</label>
            <input type="file" class="form-control" id="health_certificate" name="health_certificate" accept="image/*,application/pdf" required>
        </div>
        @error('health_certificate')
            <div class="alert alert-danger  text-dark">{{ $message }}</div>
        @enderror
    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mt-4">Upload Document</button>
    </form>
    
    </div>


</div>
@endsection
