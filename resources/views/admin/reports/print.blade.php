@extends('includes.layouts.app')

@section('page-title', 'Printable Report')

@section('content')
    <div class="container mt-4">
        <!-- Header with Logos and Centered Text (Fixed for Print) -->
        <header class="print-header d-flex justify-content-between align-items-center mb-4">
            <!-- Left Logo (NISU) -->
            <div class="logo-left">
                <img src="{{ asset('storage/NISU.png') }}" alt="NISU Logo" style="height: 120px;">
            </div>

            <!-- Centered Text -->
            <div class="text-center">
                <h2 class="mb-1">NORTHERN ILOLO STATE UNIVERSITY</h2>
                <h3 class="mb-1">COLLEGE OF INFORMATION AND COMPUTING STUDIES</h3>
                <p>CUDILLA AVENUE, ESTANCIA, ILOILO</p>
            </div>

            <!-- Right Logo (CICS) -->
            <div class="logo-right">
                <img src="{{ asset('storage/CICS.png') }}" alt="CICS Logo" style="height: 120px;">
            </div>
        </header>

        <!-- Content Wrapper with Added Margin for Print -->
        <div class="content-wrapper">
            <!-- Page Title (Student Reports) centered above the user info -->
            <h1 class="text-center mb-4">Student Reports</h1>

            <!-- Logged-in User Information Positioned at Top Left of Table -->
            <div class="user-info mb-4">
                <p><strong>OJT SUpervisor: </strong>{{ $loggedInUser->firstname }} {{ $loggedInUser->middlename }} {{ $loggedInUser->lastname }}</p>
            </div>

            <!-- Student Report Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Student Name</th>
                        <th scope="col" class="text-center">Course</th>
                        <th scope="col" class="text-center">Agency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="text-center">{{ $student->fullname }}</td>
                            <td class="text-center">{{ $student->course }}</td>
                            <td class="text-center">{{ $student->designation }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Print Button (only visible on screen) -->
        <div class="no-print text-end mt-4">
            <button onclick="window.print()" class="btn btn-success">Print</button>
        </div>
    </div>

    <!-- Print Styling -->
    <style>
        @media print {
            /* Hide everything except the printable content */
            body * {
                visibility: hidden;
            }

            .container, .container * {
                visibility: visible;
            }

            .container {
                width: 100%;
                margin: 0;
                padding: 0;
                position: absolute;
                top: 0;
                left: 0;
            }

            /* Fixed Header for each printed page */
            .print-header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                margin-top: 0;
                width: 100%;
                text-align: center;
            }

            /* Add Margin to the Content Wrapper to Prevent Overlap */
            .content-wrapper {
                margin-top: 160px; /* Ensure content is pushed down */
            }

            /* Positioning User Info */
            .user-info {
                position: relative;
                margin-top: 20px;
            }

            /* Page Title */
            h1 {
                margin-top: 100px; /* Position the title below the fixed header */
            }

            /* Adjust Table Positioning */
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
                margin-top: 20px; /* Adjust table spacing */
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }

            th {
                text-align: center;
            }

            thead {
                display: table-header-group; /* Ensures headers repeat */
            }

            .no-print {
                display: none;
            }
        }
    </style>
@endsection
