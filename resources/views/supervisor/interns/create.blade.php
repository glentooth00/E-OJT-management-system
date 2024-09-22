@extends('includes.layouts.supervisor')


@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interns Evaluation</h1>
        </div>
        <section class="mt-5 mb-5">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center" style="border-top: 1px solid gray; border-bottom: 1px solid gray;">
                                <span><b>On-The-Job Trainin Program</b></span><br>
                                <span><b>Student-Trainee Evaluation Checklist</b></span>
                            </div>
                            <div class="mt-5">
                                <b>
                                    <span>Name of Student Trainee: <span style="border-bottom: 1px solid gray;">(Insert Data from DB)</span></span>
                                    <span>Course/Year <span style="border-bottom: 1px solid gray;">(Insert Data from DB)</span></span>
                                </b>
                                <div class="mt-3">
                                    <P>Instruction:</P>
                                    <p class="text-center">
                                        <b>
                                            Please encircle the rating that would best describe the above-mentioned trainee.
                                        </b>
                                    </p>
                                </div>
                                <form action="">
                                    <div class="row mt-5">
                                        <div class="col-md-4">
                                            <div>
                                                <p><b>A. Attendace</b></p>
                                                <span><input type="checkbox"> Absent frequently</span><br>
                                                <span><input type="checkbox"> Absent occationally</span><br>
                                                <span><input type="checkbox"> Attending regularly</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>B. Punctuality</b></p>
                                                <span><input type="checkbox"> Late frequently</span><br>
                                                <span><input type="checkbox"> Late occationally</span><br>
                                                <span><input type="checkbox"> Report to work on time</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>C. Initiative</b></p>
                                                <span><input type="checkbox"> Never goes beyond minimum duty</span><br>
                                                <span><input type="checkbox"> Occationally initiate action</span><br>
                                                <span><input type="checkbox"> Self-starter of good ideas</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>D. Ability to Plan Activities</b></p>
                                                <span><input type="checkbox"> Requires constant supervision</span><br>
                                                <span><input type="checkbox"> Follows work plans effectively</span><br>
                                                <span><input type="checkbox"> Handles work well</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>E. Cooperation</b></p>
                                                <span><input type="checkbox"> Does not cooperate</span><br>
                                                <span><input type="checkbox"> Works well with others</span><br>
                                                <span><input type="checkbox"> Sets good example in teamwork</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>F. Interest and attitudes towards work</b></p>
                                                <span><input type="checkbox"> Indifferent and lacks interest</span><br>
                                                <span><input type="checkbox"> Industrious</span><br>
                                                <span><input type="checkbox"> Hardworking and strives to get head</span>
                                            </div>
                                            <div class="mt-2">
                                                <p><b>G. Major Field of Concentration</b></p>
                                                <span>(Weldling, Repair, Machine, Work, Typing, Filling, Accounting,
                                                    Recording, File Processing, Inland and Marine Fisheries
                                                )</span> <br> <br>
                                                <span><input type="checkbox"> Lacks practice</span><br>
                                                <span><input type="checkbox"> Handle activity fairly well</span><br>
                                                <span><input type="checkbox"> knowledgeable</span>
                                            </div>
                                             <div class="mt-2">
                                                <p><b>H. Apprearance </b></p>
                                                <span><input type="checkbox"> Suitable and acceptable</span><br>
                                                <span><input type="checkbox"> Create distinctly impression</span><br>
                                                <span><input type="checkbox"> Impressive, command, admiration</span>
                                            </div>
                                             <div class="mt-2">
                                                <p><b>I. Alertness </b></p>
                                                <span><input type="checkbox"> Low in grasping instruction/Misunderstands instrcution</span><br>
                                                <span><input type="checkbox"> Nearly grasps intent instruction</span><br>
                                                <span><input type="checkbox"> Exceptionally quick to understand</span>
                                            </div>
                                             <div class="mt-2">
                                                <p><b>J. Self-confidence </b></p>
                                                <span><input type="checkbox"> Timid, hesitant, is easily influenced</span><br>
                                                <span><input type="checkbox"> Moderately confidence of himself/herself</span><br>
                                                <span><input type="checkbox"> Show superior self-assurance</span>
                                            </div>
                                             <div class="mt-4">
                                                <br><br><br>
                                                <p><b>Overall Comments and Remarks</b></p>
                                             
                                            </div>
                                        </div>
    
                                        <div class="col-md-4 text-center">
                                            <div>
                                                <p>Rating Point</p>
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
                                                <br><br><br><br><br>
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
                                        </div>
    
                                        <div class="col-md-4 text-center">
                                            <p>Points</p>
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
                                            </div>
                                            <div class="mt-5">
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
                                            </div>
                                             <div class="mt-5">
                                                <br><br>
                                                <span>(TOTAL POINTS HERE)</span><br>
                                                <span style="border-top: 1px solid gray;">Total Points</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Comment here....."></textarea>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <div class="row">
                                                <div class="col-md-6 mt-5">
                                                    <div class="text-center">
                                                        <span style="border-bottom: 1px solid gray;">(DATE HERE)</span>
                                                        <p>Date</p>
                                                    </div>
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
                                            <button type="submit" class="btn btn-success btn-lg float-right"><i class="fas fa-save"></i> Submit</button>
                                        </div>
                                    </div>
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
