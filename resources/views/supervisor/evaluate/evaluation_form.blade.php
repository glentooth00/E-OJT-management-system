@extends('includes.layouts.supervisor')

@section('page-title', 'Intern Evaluation')


@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interns Evaluation</h1>
        </div>
        <section class="mt-5 mb-5">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center" style="border-top: 1px solid gray; border-bottom: 1px solid gray;">
                                <span><b>On-The-Job Trainin Program</b></span><br>
                                <span><b>Student-Trainee Evaluation Checklist</b></span>
                            </div>
                            <div class="mt-5">
                                <b>
                                    <span>Name of Student Trainee: <span style="border-bottom: 1px solid gray;">{{ $student->fullname }}</span></span>
                                    <span>Course/Year <span style="border-bottom: 1px solid gray;">{{ $student->course }} {{ $student->year_level }}</span></span>  


                                </b>
                                <div class="mt-3">
                                    <P>Instruction:</P>
                                    <p class="text-center">
                                        <b>
                                            Please encircle the rating that would best describe the above-mentioned trainee.
                                        </b>
                                    </p>
                                </div>
                                <form action="{{ route('supervisor.evaluation.store') }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="studentName" value="{{ $student->fullname }}">
                                    <input type="hidden" name="studentId" value="{{ $student->id }}">
                                    <div class="row mt-5">
                                        <div class="col-md-4">

                                            <div>
                                                <p><b>A. Attendance</b></p>
                                                @foreach ($attendances as $attendance)
                                                <span>
                                                    <input type="checkbox" name="attendance_questions[{{ $attendance->question }}]" value="{{ $attendance->question }}" onclick="selectOnlyOne(this)">
                                                    {{ $attendance->question }} 
                                                    <input type="hidden" name="attendance_points[{{ $attendance->question }}]" value="{{ $attendance->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>
                                            
                                            <div class="mt-2">
                                                <p><b>B. Punctuality</b></p>
                                                @foreach ($punctualities as $punctuality)
                                                <span>
                                                    <input type="checkbox" name="punctuality_questions[{{ $punctuality->question }}]" value="{{ $punctuality->question }}" onclick="selectOnlyOnePunctuality(this)">
                                                    {{ $punctuality->question }} 
                                                    <input type="hidden" name="punctuality_points[{{ $punctuality->question }}]" value="{{ $punctuality->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>
                                            

                                        <div class="mt-2">
                                            <p><b>C. Initiative</b></p>
                                            @foreach ($initiatives as $initiative)
                                            <span>
                                                <input type="checkbox" name="initiative_questions[{{ $initiative->question }}]" value="{{ $initiative->question }}" onclick="selectOnlyOneInitiative(this)">
                                                {{ $initiative->question }} 
                                                <input type="hidden" name="initiative_points[{{ $initiative->question }}]" value="{{ $initiative->points }}">
                                            </span><br>
                                            @endforeach
                                        </div>
                                            
                                        <div class="mt-2">
                                            <p><b>D. Ability to Plan Activities</b></p>
                                            @foreach ($plannings as $planning)
                                            <span>
                                                <input type="checkbox" name="planning_questions[{{ $planning->question }}]" value="{{ $planning->question }}" onclick="selectOnlyOnePlanning(this)">
                                                {{ $planning->question }} 
                                                <input type="hidden" name="planning_points[{{ $planning->question }}]" value="{{ $planning->points }}">
                                            </span><br>
                                            @endforeach
                                        </div>
                                            
                                        <div class="mt-2">
                                            <p><b>E. Cooperation</b></p>
                                            @foreach ($cooperations as $cooperation)
                                            <span>
                                                <input type="checkbox" name="cooperation_questions[{{ $cooperation->question }}]" value="{{ $cooperation->question }}" onclick="selectOnlyOneCooperation(this)">
                                                {{ $cooperation->question }} 
                                                <input type="hidden" name="cooperation_points[{{ $cooperation->question }}]" value="{{ $cooperation->points }}">
                                            </span><br>
                                            @endforeach
                                        </div>

                                        <div class="mt-2">
                                            <p><b>F. Interest and attitudes towards work</b></p>
                                            @foreach ($interests as $interest)
                                            <span>
                                                <input type="checkbox" name="interest_questions[{{ $interest->question }}]" value="{{ $interest->question }}" onclick="selectOnlyOneInterest(this)">
                                                {{ $interest->question }} 
                                                <input type="hidden" name="interest_points[{{ $interest->question }}]" value="{{ $interest->points }}">
                                            </span><br>
                                            @endforeach
                                        </div>

                                            <br>
                                            <div class="mt-2">
                                                <p><b>G. Major Field of Concentration</b></p>
                                                <span>(Welding, Repair, Machine, Work, Typing, Filling, Accounting,
                                                    Recording, File Processing, Inland and Marine Fisheries)</span><br><br>
                                                @foreach ($fields as $field)
                                                <span>
                                                    <input type="checkbox" name="field_questions[{{ $field->question }}]" value="{{ $field->question }}" onclick="selectOnlyOneField(this)">
                                                    {{ $field->question }} 
                                                    <input type="hidden" name="field_points[{{ $field->question }}]" value="{{ $field->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>


                                            <div class="mt-2">
                                                <p><b>H. Appearance</b></p>
                                                @foreach ($appearances as $appearance)
                                                <span>
                                                    <input type="checkbox" name="appearance_questions[{{ $appearance->question }}]" value="{{ $appearance->question }}" onclick="selectOnlyOneAppearance(this)">
                                                    {{ $appearance->question }} 
                                                    <input type="hidden" name="appearance_points[{{ $appearance->question }}]" value="{{ $appearance->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>

                                            <br>
                                            <div class="mt-2">
                                                <p><b>I. Alertness</b></p>
                                                @foreach ($alertness as $alert)
                                                <span>
                                                    <input type="checkbox" name="alert_questions[{{ $alert->question }}]" value="{{ $alert->question }}" onclick="selectOnlyOneAlert(this)">
                                                    {{ $alert->question }} 
                                                    <input type="hidden" name="alert_points[{{ $alert->question }}]" value="{{ $alert->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>

                                            <div class="mt-2">
                                                <p><b>J. Self-confidence</b></p>
                                                @foreach ($self_confidence as $self)
                                                <span>
                                                    <input type="checkbox" name="self_questions[{{ $self->question }}]" value="{{ $self->question }}" onclick="selectOnlyOneSelfConfidence(this)">
                                                    {{ $self->question }} 
                                                    <input type="hidden" name="self_points[{{ $self->question }}]" value="{{ $self->points }}">
                                                </span><br>
                                                @endforeach
                                            </div>
                                            
                                            
                                            <div class="mt-4">
                                                <br><br><br>
                                                <p><b>Overall Comments and Remarks</b></p>

                                            </div>
                                        </div>

                                        <div class="col-md-4 text-center">
                                            <div>

{{--                                                 
                                                <span>0.8</span><br>
                                                <span>1</span> --}}
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                          <div class="mt-4">
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                             <div class="mt-4">
                                                <br>
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                              <div class="mt-4">
                                                <br>
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                            <div class="mt-4">
                                                <br>
                                                <span>0.6</span><br>
                                                <span>0.8</span><br>
                                                <span>1</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 text-center">
                                            {{-- <p>Points</p>
                                            <div>
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div> --}}
                                            {{-- <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br><br><br><br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div>
                                            <div class="mt-5">
                                                <br><br>
                                                <span style="border-bottom: 1px solid gray;">0.6</span>
                                            </div> --}}
                                            {{-- <div class="mt-5">
                                                <br><br>
                                                <span>(TOTAL POINTS HERE)</span><br>
                                                <span style="border-top: 1px solid gray;">Total Points</span>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <textarea name="remarks" id="" cols="30" rows="2" class="form-control"
                                                placeholder="Comment here....."></textarea>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="row">
                                                <div class="col-md-6 mt-5">
                                                    {{-- <div class="text-center">
                                                        <span style="border-bottom: 1px solid gray;">(DATE HERE)</span>
                                                        <p>Date</p>
                                                    </div> --}}
                                                    <div class="ml-5 mt-5">
                                                        <h5>GRADING SYSTEM</h5>
                                                        <ul>
                                                            <li>8.6 - 10 = 95%</li>
                                                            <li>7.6 - 8.5 = 90%</li>
                                                            <li>6.6 - 7.5 = 85%</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <!-- <button type="submit" class="btn btn-success btn-lg float-right"><i
                                                    class="fas fa-save"></i> Submit</button> -->
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
<script>
      function selectOnlyOne(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="attendance_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOnePunctuality(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="punctuality_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneInitiative(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="initiative_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOnePlanning(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="planning_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneCooperation(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="cooperation_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneInterest(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="interest_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneField(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="field_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneAppearance(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="appearance_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }
    function selectOnlyOneAlert(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="alert_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }

    function selectOnlyOneSelfConfidence(checkbox) {
        const checkboxes = document.querySelectorAll('input[name^="self_questions"]');
        checkboxes.forEach(cb => {
            if (cb !== checkbox) cb.checked = false;
        });
    }
</script>