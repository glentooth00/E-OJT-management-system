@extends('includes.layouts.students')

@section('page-title', 'Student Dashboard')

@section('content')
<!-- Container Fluid-->
<div class="container-fluid mb-5">
    <h3>Download Forms</h3>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>FILE NAME</th>
                                <th>IMAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <!-- Good Moral Document -->
                                <tr>
                                    <td><h5>Good Moral</h5></td>
                                    <td>
                                        @if (!empty($document->good_moral))
                                            <img src="{{ asset($document->good_moral) }}" alt="Good Moral Document" style="max-width: 150px;">
                                        @else
                                            No Document Available
                                        @endif
                                    </td>
                                </tr>
                                <!-- Endorsement Letter -->
                                <tr>
                                    <td><h5>Endorsement Letter</h5></td>
                                    <td>
                                        @if (!empty($document->endorsement_letter))
                                            <img src="{{ asset($document->endorsement_letter) }}" alt="Endorsement Letter" style="max-width: 150px;">
                                        @else
                                            No Document Available
                                        @endif
                                    </td>
                                </tr>
                                <!-- Letter of Consent -->
                                <tr>
                                    <td><h5>Letter of Consent</h5></td>
                                    <td>
                                        @if (!empty($document->letter_of_consent))
                                            <img src="{{ asset($document->letter_of_consent) }}" alt="Letter of Consent" style="max-width: 150px;">
                                        @else
                                            No Document Available
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($healthCertificates as $healthCertificate)
                                <tr>
                                    <td><h5>Medical Certificate</h5></td>
                                    <td>
                                        @if (!empty($healthCertificate->file_path))
                                            <img src="{{ asset($healthCertificate->file_path) }}" alt="Medical Certificate" style="max-width: 150px;">
                                        @else
                                            No Document Available
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Download PDF Button -->
                    <form action="{{ route('download.pdf') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Download All as PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
