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
                                <th>DOWNLOAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <!-- Good Moral Document -->
                                @if (!empty($document->good_moral))
                                    <tr>
                                        <td><h5>Good Moral</h5></td>
                                        <td>
                                            <img src="{{ asset($document->good_moral) }}" alt="Good Moral Document" style="max-width: 150px;">
                                        </td>
                                        <td>
                                            <a href="{{ asset($document->good_moral) }}" download class="btn btn-primary">Download</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">No Good Moral Document available</td>
                                    </tr>
                                @endif

                                <!-- Endorsement Letter -->
                                @if (!empty($document->endorsement_letter))
                                    <tr>
                                        <td><h5>Endorsement Letter</h5></td>
                                        <td>
                                            <img src="{{ asset($document->endorsement_letter) }}" alt="Endorsement Letter" style="max-width: 150px;">
                                        </td>
                                        <td>
                                            <a href="{{ asset($document->endorsement_letter) }}" download class="btn btn-primary">Download</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">No Endorsement Letter available</td>
                                    </tr>
                                @endif

                                <!-- Letter of Consent -->
                                @if (!empty($document->letter_of_consent))
                                    <tr>
                                        <td><h5>Letter of Consent</h5></td>
                                        <td>
                                            <img src="{{ asset($document->letter_of_consent) }}" alt="Letter of Consent" style="max-width: 150px;">
                                        </td>
                                        <td>
                                            <a href="{{ asset($document->letter_of_consent) }}" download class="btn btn-primary">Download</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="3">No Letter of Consent available</td>
                                    </tr>
                                @endif
                            @endforeach

                            <!-- Medical Certificate -->
                            @foreach ($healthCertificates as $healthCertificate)
                                <tr>
                                    <td>
                                        @if (empty($healthCertificate->file_path))
                                            No Medical Certificate available
                                        @else
                                            <h5>Medical Certificate</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($healthCertificate->file_path))
                                            <img src="{{ asset($healthCertificate->file_path) }}" alt="Medical Certificate" style="max-width: 150px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($healthCertificate->file_path))
                                            <a href="{{ asset($healthCertificate->file_path) }}" download class="btn btn-primary">Download</a>
                                        @else
                                            <span>No Document</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Controls -->
                    <div class="mt-4">
                        {{ $documents->links() }} <!-- For documents pagination -->
                        {{ $healthCertificates->links() }} <!-- For health certificates pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
