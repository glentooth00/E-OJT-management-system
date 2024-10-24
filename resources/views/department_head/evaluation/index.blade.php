@extends('includes.layouts.department')

@section('page-title', 'Evaluations')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Intern Evaluations</h1>
        </div>

        {{-- <section>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Registered Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Pending Interns
                                    </div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Agencies</div>
                                    <div class="h3 mb-0 font-weight-bold text-gray-800">10</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-regular fa-building fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="mt-2">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Department head Accounts</h6>
                    <div>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Account
                        </button> --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                {{-- <th>Name</th> --}}
                                <th>Name</th>
                                <th>Date Evaluated</th>
                                <th>Points</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluations as $evaluation)
                                <tr>
                                    <td>{{ $evaluation->student_name }}</td>
                                    <td>{{ $evaluation->created_at }}</td>
                                    <td>{{ $evaluation->total_score }}</td>
                                    <td>
                                        <a href="javascript:void(0);" 
                                        class="btn btn-success btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal"
                                        onclick="loadEvaluationData({{ json_encode($evaluation) }})"> <!-- Passing the entire evaluation object -->
                                        View Evaluation
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        
                        
                            {{-- @foreach ($department_heads as $department_head)
                                <tr>
                                    <td>{{ $department_head->first_name }} {{ $department_head->middle_name }}
                                        {{ $department_head->last_name }}</td>
                                    <td>{{ $department_head->department }}</td>
                                    <td>
                                        <button class="btn btn-primary">EDIT</button>
                                        <button class="btn btn-secondary">VIEW</button>
                                        <button class="btn btn-danger">DELETE</button>

                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Evaluation Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Two columns: questions on the left, points on the right -->
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Attendance:</strong> <span id="modalAttendanceQuestions"></span> - <span id="modalAttendancePoints"></span></p>
                                <p><strong>Punctuality:</strong> <span id="modalPunctualityQuestions"></span> - <span id="modalPunctualityPoints"></span></p>
                                <p><strong>Initiative:</strong> <span id="modalInitiativeQuestions"></span> - <span id="modalInitiativePoints"></span></p>
                                <p><strong>Planning:</strong> <span id="modalPlanningQuestions"></span> - <span id="modalPlanningPoints"></span></p>
                                <p><strong>Cooperation:</strong> <span id="modalCooperationQuestions"></span> - <span id="modalCooperationPoints"></span></p>
                                <p><strong>Interest:</strong> <span id="modalInterestQuestions"></span> - <span id="modalInterestPoints"></span></p>
                                <p><strong>Field:</strong> <span id="modalFieldQuestions"></span> - <span id="modalFieldPoints"></span></p>
                                <p><strong>Appearance:</strong> <span id="modalAppearanceQuestions"></span> - <span id="modalAppearancePoints"></span></p>
                                <p><strong>Alertness:</strong> <span id="modalAlertQuestions"></span> - <span id="modalAlertPoints"></span></p>
                                <p><strong>Self-Control:</strong> <span id="modalSelfQuestions"></span> - <span id="modalSelfPoints"></span></p>
                                <p><strong>Total Score:</strong> <span id="modalTotalScore"></span></p>
                                <p><strong>Remarks:</strong> <span id="modalRemarks"></span></p>
                            </div>
                            <div class="col-6 text-end">
                                <p id="modalAttendancePoints"></p>
                                <p id="modalPunctualityPoints"></p>
                                <p id="modalInitiativePoints"></p>
                                <p id="modalPlanningPoints"></p>
                                <p id="modalCooperationPoints"></p>
                                <p id="modalInterestPoints"></p>
                                <p id="modalFieldPoints"></p>
                                <p id="modalAppearancePoints"></p>
                                <p id="modalAlertPoints"></p>
                                <p id="modalSelfPoints"></p>
                            </div>
                        </div>
                        <!-- Total Score and Percentage beside each other -->
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Total Score:</strong></p>
                            </div>
                            <div class="col-6 text-end">
                                <p id="modalTotalScore"></p> <!-- The total score and percentage will be placed here -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Remarks:</strong> <span id="modalRemarks"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
    
    <!---Container Fluid-->
@endsection
<script>
function loadEvaluationData(evaluation) {
    // Populate questions and points
    document.getElementById('modalAttendanceQuestions').innerText = evaluation.attendance_questions;
    document.getElementById('modalAttendancePoints').innerText = evaluation.attendance_points;
    document.getElementById('modalPunctualityQuestions').innerText = evaluation.punctuality_questions;
    document.getElementById('modalPunctualityPoints').innerText = evaluation.punctuality_points;
    document.getElementById('modalInitiativeQuestions').innerText = evaluation.initiative_questions;
    document.getElementById('modalInitiativePoints').innerText = evaluation.initiative_points;
    document.getElementById('modalPlanningQuestions').innerText = evaluation.planning_questions;
    document.getElementById('modalPlanningPoints').innerText = evaluation.planning_points;
    document.getElementById('modalCooperationQuestions').innerText = evaluation.cooperation_questions;
    document.getElementById('modalCooperationPoints').innerText = evaluation.cooperation_points;
    document.getElementById('modalInterestQuestions').innerText = evaluation.interest_questions;
    document.getElementById('modalInterestPoints').innerText = evaluation.interest_points;
    document.getElementById('modalFieldQuestions').innerText = evaluation.field_questions;
    document.getElementById('modalFieldPoints').innerText = evaluation.field_points;
    document.getElementById('modalAppearanceQuestions').innerText = evaluation.appearance_questions;
    document.getElementById('modalAppearancePoints').innerText = evaluation.appearance_points;
    document.getElementById('modalAlertQuestions').innerText = evaluation.alert_questions;
    document.getElementById('modalAlertPoints').innerText = evaluation.alert_points;
    document.getElementById('modalSelfQuestions').innerText = evaluation.self_questions;
    document.getElementById('modalSelfPoints').innerText = evaluation.self_points;

    // Calculate percentage based on the total score
    let totalScore = evaluation.total_score;
    let percentage = '';

    if (totalScore >= 8.6 && totalScore <= 10) {
        percentage = '95%';
    } else if (totalScore >= 7.6 && totalScore <= 8.5) {
        percentage = '90%';
    } else if (totalScore >= 6.6 && totalScore <= 7.5) {
        percentage = '85%';
    } else {
        percentage = ''; // No percentage for lower scores
    }

    // Display total score with a dash and percentage
    document.getElementById('modalTotalScore').innerText = `${totalScore} -- ${percentage}`;

    // Populate remarks
    document.getElementById('modalRemarks').innerText = evaluation.remarks;
}


</script>
