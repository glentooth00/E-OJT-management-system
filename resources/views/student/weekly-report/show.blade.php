@extends('includes.layouts.students')


@section('content')
    <!-- Container Fluid-->

    <div class="container">
        <div class="row">
            @foreach ($weeklyReports as $report)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $report->file_path) }}" class="card-img-top" alt="Activity Photo">

                        <div class="card-body">
                            <h5 class="card-title">Week No. {{ $report->week_number }}</h5>
                            <p class="card-text">Date Submitted: {{ date('m/d/Y', strtotime($report->created_at)) }}</p>
                            <a href="{{ asset('storage/' . $report->file_path) }}" class="btn btn-primary"
                                target="_blank">View File</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




    </section>
    <!---Container Fluid-->
@endsection
