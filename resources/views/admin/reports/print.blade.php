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
                <h2 class="mb-1">NORTHERN ILOILO STATE UNIVERSITY</h2>
                <h3 class="mb-1">COLLEGE OF INFORMATION AND COMPUTING STUDIES</h3>
                <p>CUDILLA AVENUE, ESTANCIA, ILOILO</p>
            </div>

            <!-- Right Logo (CICS) -->
            <div class="logo-right">
                <img src="{{ asset('storage/CICS.png') }}" alt="CICS Logo" style="height: 120px;">
            </div>
        </header>

        <!-- Page Title -->
        <h1 class="mb-4 text-center">Student Reports</h1>

        <!-- Department Head Information Positioned at Bottom Left (First Page Only) -->
        @if($department_head)
            <div class="department-head-container">
                <span class="underlined">{{ $department_head->first_name }} {{ $department_head->middle_name }} {{ $department_head->last_name }}</span>
                <h4>Department Head</h4>
            </div>
        @endif

        <!-- Page Break (Start of the next page) -->
        <div style="page-break-before: always;"></div>

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

            /* Department Head at Bottom Left, First Page Only */
            .department-head-container {
                position: absolute;
                top: 10px;
                left: 10px;
                text-align: left;
                page-break-after: avoid;
                page-break-inside: avoid;
            }

            .underlined {
                text-decoration: underline;
                display: block;
                font-weight: bold;
            }

            /* Page Break for Tables */
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
                margin-top: 180px; /* offset for header */
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
