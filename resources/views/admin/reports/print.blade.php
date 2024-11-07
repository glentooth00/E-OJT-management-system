@extends('includes.layouts.app')

@section('page-title', 'Printable Report')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Student Reports</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Student Name</th>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Course</th>
                    <th scope="col" class="text-center">Agency</th>
                    <th scope="col" class="text-center">Year Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="text-center">{{ $student->fullname }}</td>
                        <td class="text-center">{{ $student->id_number }}</td>
                        <td class="text-center">{{ $student->course }}</td>
                        <td class="text-center">{{ $student->designation }}</td>
                        <td class="text-center">{{ $student->year_level }}</td>
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
            /* Hide the entire page content except the .container */
            body * {
                visibility: hidden;
            }

            /* Make the container visible and take the full width of the page */
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

            /* Ensure table styles for print */
            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                text-align: center;
            }

            /* Hide the print button */
            .no-print {
                display: none;
            }
        }
    </style>
@endsection
