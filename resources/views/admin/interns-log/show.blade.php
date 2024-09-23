@extends('includes.layouts.app')


@section('content')

      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Intern's Log</h1>
            </div>
            <a href="/admin/interns-log" class="btn btn-secondary btn-sm">Back</a>

            <section class="mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Name:</b> Alvin Mark Mantung</p>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Date:</b> 05/27/2024
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <p>Activity Photos:</p>
                                    <img src="/admin/images/user1.png" width="150" alt="png">
                                        <hr>
                                            <h5><b>Number of Week: </b> 1</h5>
                                        <hr>
                                </div>
                                <div class="card">
                                    <div class="card-header"><b>Activity Description</b></div>
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia tempore optio, asperiores, harum unde minima quaerat explicabo ab labore sequi fuga eos aperiam deleniti rem corporis mollitia, fugiat possimus at?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!---Container Fluid-->

@endsection