@extends('includes.layouts.department')

@section('page-title', 'Evaluations')

@section('content')
<style>
    .custom-modal {
        max-width: 800px; /* Adjust the width as needed */
    }
</style>
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
            <div class="modal-dialog modal-lg"> <!-- Add modal-lg for a larger modal -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Evaluation Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Evaluation Criteria</th>
                                    <th>Details</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Attendance:</td>
                                    <td>Attending regularly</td>
                                    <td id="modalAttendancePoints">1</td>
                                </tr>
                                <tr>
                                    <td>Punctuality:</td>
                                    <td>Report to work on time</td>
                                    <td id="modalPunctualityPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Initiative:</td>
                                    <td>Self-starter of good ideas</td>
                                    <td id="modalInitiativePoints">1</td>
                                </tr>
                                <tr>
                                    <td>Planning:</td>
                                    <td>Handles work well</td>
                                    <td id="modalPlanningPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Cooperation:</td>
                                    <td>Sets good example in teamwork</td>
                                    <td id="modalCooperationPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Interest:</td>
                                    <td>Hardworking and strives to get ahead</td>
                                    <td id="modalInterestPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Field of Interest:</td>
                                    <td>Knowledgeable</td>
                                    <td id="modalFieldPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Appearance:</td>
                                    <td>Impressive, commands admiration</td>
                                    <td id="modalAppearancePoints">1</td>
                                </tr>
                                <tr>
                                    <td>Alertness:</td>
                                    <td>Exceptionally quick to understand</td>
                                    <td id="modalAlertPoints">1</td>
                                </tr>
                                <tr>
                                    <td>Self-Control:</td>
                                    <td>Shows superior self-assurance</td>
                                    <td id="modalSelfPoints">1</td>
                                </tr>
                            </tbody>
                        </table>
        
                        <!-- Total Score Section -->
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Total Score:</strong></p>
                            </div>
                            <div class="col-6 text-end">
                                <p id="modalTotalScore" class="h5"></p>
                            </div>
                        </div>
        
                        <!-- Remarks Section -->
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Remarks:</strong><br><br> <span id="modalRemarks" class="text-muted"></span></p>
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
    console.log(evaluation); // Inspect the evaluation object

    // Populate questions and points
    document.getElementById('modalAttendancePoints').innerText = evaluation.attendance_points;
    document.getElementById('modalPunctualityPoints').innerText = evaluation.punctuality_points;
    document.getElementById('modalInitiativePoints').innerText = evaluation.initiative_points;
    document.getElementById('modalPlanningPoints').innerText = evaluation.planning_points;
    document.getElementById('modalCooperationPoints').innerText = evaluation.cooperation_points;
    document.getElementById('modalInterestPoints').innerText = evaluation.interest_points;
    document.getElementById('modalFieldPoints').innerText = evaluation.field_points;
    document.getElementById('modalAppearancePoints').innerText = evaluation.appearance_points;
    document.getElementById('modalAlertPoints').innerText = evaluation.alert_points;
    document.getElementById('modalSelfPoints').innerText = evaluation.self_points;

    // Calculate total score and percentage
    let totalScore = parseFloat(evaluation.total_score); // Ensure it's a number
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
