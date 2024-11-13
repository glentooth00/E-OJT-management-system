@extends('includes.layouts.app')

@section('page-title', 'Endorsement Letter')

@section('content')
<div class="container my-5">
    @if ($errors->any())
        <div class="alert alert-danger text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success text-success">
            {{ session('success') }}
        </div>
    @endif

<!-- Page Header -->
<header class="print-header d-flex justify-content-between align-items-center mb-4">
    <!-- Left Logo (NISU) -->
    <div class="logo-left">
        <img src="{{ asset('storage/NISU.png') }}" alt="NISU Logo" style="height: 120px;">
    </div>

    <!-- Centered Text -->
    <div class="text-center">
        <p>Republic of the Philippines</p>
        <h2 class="mb-1">NORTHERN ILOLO STATE UNIVERSITY</h2>
        <p>NISU Main Campus, V Cudilla Sr. Ave, Estancia, Iloilo</p>
        <h3 class="mb-1">OFFICE OF THE INDUSTRIAL PROJECT TRAINING SUPERVISOR</h3>
        <h4>ENDORSEMENT LETTER</h4>
    </div>

    <!-- Right Logo (CICS) -->
    <div class="logo-right">
        <img src="{{ asset('storage/CICS.png') }}" alt="CICS Logo" style="height: 120px;">
    </div>
</header>

<!-- Main Content for Endorsement Letter -->
<form method="POST" action="{{ route('store.endorsements') }}">
    @csrf

    <!-- Endorsement Letter Content -->
    <div class="form-group">
        <label for="agencyPersonnel">Name of Agency Personnel</label>
        <input type="text" class="form-control" id="agencyPersonnel" name="agencyPersonnel" placeholder="Enter Name of Agency Personnel" 
            value="{{ old('agencyPersonnel', $endorsement->agency_personnel) }}" required readonly>
    </div>

    <div class="form-group">
        <label for="agencyName">Name of Agency</label>
        <select class="form-control" id="agencyName" name="agencyName" required disabled>
            <option value="" disabled selected>Select an Agency</option>
            @foreach($agencies as $agency)
                <option value="{{ $agency->agency_name }}" 
                    {{ old('agencyName', $endorsement->agency_name) == $agency->agency_name ? 'selected' : '' }}>
                    {{ $agency->agency_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="agencyAddress">Address</label>
        <input type="text" class="form-control" id="agencyAddress" name="agencyAddress" placeholder="Enter Address" 
            value="{{ old('agencyAddress', $endorsement->agency_address) }}" required readonly>
    </div>

    <div class="form-group mt-4">
        <textarea class="form-control" id="endorsementLetter" rows="10" readonly>
            Dear [Ma’am/Sir],

            This office would like to endorse [Name of student, Year Level, Name of Department] student of Northern Iloilo State University- Estancia, Campus, to undergo On-The-Job Training (OJT) in your prestigious establishment this summer, [School year].

            This training is an inherent requirement of the course and would update the trainee’s work values development, knowledge and technical skills to meet the needs of the industry both locally and internationally.

            We are confident that your agency would be an ideal training ground for our student to be a multi-skilled worker, equipped further with personal, professional and favorable consideration.

            Thank you very much and more power!
        </textarea>
    </div>

    <!-- Student Information Section -->
    <div id="studentsSection">
        <!-- Table for student entries -->
        <table class="table" id="studentsTable">
            <thead>
                <tr>
                    <th>Name of Student</th>
                    <th>Year Level</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <!-- Prepopulate with existing student data if available -->
                @if($students && count($students) > 0)
                @foreach($students as $student)
                    <tr class="student-entry">
                        <td>
                            <input type="text" class="form-control" name="studentName[]" value="{{ $student['name'] }}" placeholder="Enter Name of Student" required readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="studentYear[]" value="{{ $student['year'] }}" placeholder="Enter Year Level" required readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="{{ isset($student['department']) ? $student['department'] : '' }}" readonly>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="student-entry">
                    <td>
                        <input type="text" class="form-control" name="studentName[]" placeholder="Enter Name of Student" required readonly>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="studentYear[]" placeholder="Enter Year Level" required readonly>
                    </td>
                    <td>
                        <select class="form-control" name="studentDepartment[]" required disabled>
                            <option value="" disabled selected>Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" id="addStudentButton" disabled>
                            <i class="fa fa-plus p-2"></i> Add Student
                        </button>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <!-- Hidden input field to store student data -->
    <input type="hidden" name="students_info" id="students_info">

    <!-- Submit Button -->
    {{-- <button type="submit" class="btn btn-success mt-5" disabled>Submit Endorsement Letter</button> --}}
</form>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(document).ready(function() {

        // Add a new student entry row
        $("#addStudentButton").click(function() {
            const newRow = `
                <tr class="student-entry">
                    <td><input type="text" class="form-control" name="studentName[]" placeholder="Enter Name of Student" required></td>
                    <td><input type="text" class="form-control" name="studentYear[]" placeholder="Enter Year Level" required></td>
                    <td>
                        <select class="form-control" name="studentDepartment[]" required>
                            <option value="" disabled selected>Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button></td>
                </tr>
            `;
            $("#studentsTable tbody").append(newRow);
        });

        // Remove student entry row
        $(document).on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
        });

        // Form submission handler
        $("form").on("submit", function(event) {
            const students = [];
            let isValid = true; // Track validity of inputs

            $("#studentsTable tbody tr").each(function() {
                const studentName = $(this).find('input[name="studentName[]"]').val();
                const studentYear = $(this).find('input[name="studentYear[]"]').val();
                const studentDepartment = $(this).find('select[name="studentDepartment[]"]').val();

                // Check if all fields are filled
                if (!studentName || !studentYear || !studentDepartment) {
                    isValid = false;
                    return false; // Break out of each loop
                }

                students.push({
                    name: studentName,
                    year: studentYear,
                    department: studentDepartment
                });
            });

            if (!isValid) {
                alert("Please fill in all student details before submitting.");
                event.preventDefault(); // Prevent form submission if validation fails
                return;
            }

            // Store the student data as JSON in a hidden input field
            $('#students_info').val(JSON.stringify(students));
        });
    });
</script>

