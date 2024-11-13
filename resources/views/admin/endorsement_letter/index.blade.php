@extends('includes.layouts.app')

@section('page-title', 'Endorsement Letter')

@section('content')
<!-- Displaying validation errors if any -->



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

        <!-- Endorsement Letter Content (Placed at the Top) -->
        <!-- Agency Information -->
        <div class="form-group">
            <label for="agencyPersonnel">Name of Agency Personnel</label>
            <input type="text" class="form-control" id="agencyPersonnel" name="agencyPersonnel" placeholder="Enter Name of Agency Personnel" required>
        </div>

        <div class="form-group">
            <label for="agencyName">Name of Agency</label>
            <select class="form-control" id="agencyName" name="agencyName" required>
                <option value="" disabled selected>Select an Agency</option>
                @foreach($agencies as $agency)
                    <option value="{{  $agency->agency_name}}">{{ $agency->agency_name }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label for="agencyAddress">Address</label>
            <input type="text" class="form-control" id="agencyAddress" name="agencyAddress" placeholder="Enter Address" required>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="student-entry">
                        <td>
                            <input type="text" class="form-control" name="studentName[]" placeholder="Enter Name of Student" required>
                        </td>

                        <td>
                            <input type="text" class="form-control" name="studentYear[]" placeholder="Enter Year Level" required>
                        </td>

<td>
    <select class="form-control" name="studentDepartment[]" required>
        <option value="" disabled selected>Select Department</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
        @endforeach
    </select>
</td>

                        <td>
                            <!-- Add button will be placed here -->
                            <button type="button" class="btn btn-primary" id="addStudentButton">
                                <i class="fa fa-plus p-2"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Hidden input field to store student data -->
        <input type="hidden" name="students_info" id="students_info">

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success mt-5">Submit Endorsement Letter</button>
    </form>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For Font Awesome icons -->

<script>
    $(document).ready(function() {
        // Handle add student button click
        $("#addStudentButton").click(function() {
            var newRow = `
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
            updateEndorsementLetter();
        });

        // Handle delete row button click
        $(document).on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
            updateEndorsementLetter();
        });

        // Function to update the endorsement letter with student names dynamically
        function updateEndorsementLetter() {
            var letter = `Dear [Ma’am/Sir],\n\nThis office would like to endorse `;
            var students = [];
            $('#studentsTable tbody tr').each(function() {
                var studentName = $(this).find('input[name="studentName[]"]').val();
                var studentYear = $(this).find('input[name="studentYear[]"]').val();
                var studentDepartment = $(this).find('input[name="studentDepartment[]"]').val();
                if (studentName && studentYear && studentDepartment) {
                    students.push(`${studentName}, ${studentYear} - ${studentDepartment}`);
                }
            });

            letter += students.join(', ') + ` to undergo On-The-Job Training (OJT) in your prestigious establishment this summer, [School year].\n\n`;
            letter += `This training is an inherent requirement of the course and would update the trainee’s work values development, knowledge and technical skills to meet the needs of the industry both locally and internationally.\n\nWe are confident that your agency would be an ideal training ground for our students.\n\nThank you very much and more power!`;

            $('#endorsementLetter').val(letter);
        }

        // Update the students_info hidden field before form submission
        $("form").on("submit", function(event) {
            const students = [];
            const rows = $("#studentsTable tbody tr");
            rows.each(function() {
                const studentName = $(this).find('input[name="studentName[]"]').val();
                const studentYear = $(this).find('input[name="studentYear[]"]').val();
                const studentDepartment = $(this).find('input[name="studentDepartment[]"]').val();
                students.push({
                    name: studentName,
                    year: studentYear,
                    department: studentDepartment
                });
            });

            $('#students_info').val(JSON.stringify(students));
        });
    });
</script>

