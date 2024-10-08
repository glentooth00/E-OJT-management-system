@extends('includes.layouts.supervisor')

@section('page-title', 'Interns')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interns</h1>
        </div>
        <section class="mt-5">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($interns as $intern)
                                <tr>
                                    <td>{{ $intern->fullname }}</td>
                                    <td>{{ $intern->id_number }}</td>
                                    <td>{{ $intern->department }}</td>
                                    <td>{{ $intern->course }}</td>
                                    <td>
                                    <a href="{{ route('supervisor.evaluation.evaluate', $intern->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-list"></i> Evaluate
                                    </a>  
                                    </td>

                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
