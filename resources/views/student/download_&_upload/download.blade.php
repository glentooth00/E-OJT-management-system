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
                                <tr>
                                    <td>
                                        @if (empty($document->good_moral))
                                            no document
                                        @else
                                            <h5>Good Moral</h5>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($document->good_moral) }}" alt="Good Moral Document" style="max-width: 150px;">
                                    </td>
                                    <td>
                                        <a href="{{ asset($document->good_moral) }}" download class="btn btn-primary">
                                            Download
                                        </a>
                                    </td>
                                </tr>

                                <!-- Endorsement Letter -->
                                <tr>
                                    <td>
                                        @if (empty($document->endorsement_letter))
                                        no document
                                    @else
                                        <h5>Endorsement letter</h5>
                                    @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($document->endorsement_letter) }}" alt="Endorsement Letter" style="max-width: 150px;">
                                    </td>
                                    <td>
                                        <a href="{{ asset($document->endorsement_letter) }}" download class="btn btn-primary">
                                            Download
                                        </a>
                                    </td>
                                </tr>

                                <!-- Letter of Consent -->
                                <tr>
                                    <td>
                                        @if (empty($document->letter_of_consent))
                                        no document
                                    @else
                                        <h5>Letter of consent</h5>
                                    @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($document->letter_of_consent) }}" alt="Letter of Consent" style="max-width: 150px;">
                                    </td>
                                    <td>
                                        <a href="{{ asset($document->letter_of_consent) }}" download class="btn btn-primary">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- medical certificate -->
                            @foreach ($healthCertificates as $healthCertificate)
                                 <tr>
                                <td>
                                    @if (empty($healthCertificate->file_path))
                                    no document
                                @else
                                    <h5>Medical Certificate</h5>
                                @endif
                                </td>
                                <td>
                                    <img src="{{ asset($healthCertificate->file_path) }}" alt="Letter of Consent" style="max-width: 150px;">
                                </td>
                                <td>
                                 
                                    <a href="{{ asset($healthCertificate->file_path) }}" download class="btn btn-primary">
                                        Download
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
