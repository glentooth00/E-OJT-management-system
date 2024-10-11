@extends('includes.layouts.supervisor')

@section('page-title', 'Interns')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Interns Daily Activities</h1>
        </div>
        <section class="mt-5">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Designation</th>
                                <th>Time In</th>
                                <th>
                                   
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <td>{{ $student->student }}</td>
                                <td>
                                    @if($student->status == 'Pending' )
                                        <span class="badge badge-warning btn-sm p-2" style="font-size: 15px;"> {{ $student->status }}</span>
                                    @else
                                        <span class="badge badge-success p-2" style="font-size: 15px;">Approved</span>
                                    @endif
                                   
                                </td>
                                <td>{{ $student->designation }}</td>
                                <td>{{ $student->time_in }}</td>
                                <td>
                                    @if ()
                                        
                                    @endif
                                    <button class="btn btn-sm btn-success">Approve</button>
                                    <button class="btn btn-sm btn-primary">View</button>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </section>
    </div>
    <!---Container Fluid-->
@endsection
