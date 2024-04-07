@extends('includes.layouts.app')


@section('content')

      <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Notifications</h1>
            </div>
            <section class="mt-5">
                <div class="card">
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>Course and Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cardo Dalisay</td>
                                <td>10/20/1998</td>
                                <td>29-12</td>
                                <td>CICS</td>
                                <td>BSIT. 4rth Year</td>
                                <td class="text-right">
                                     <a class="m-0 btn btn-danger btn-sm" href="#"> View More <i class="fas fa-chevron-right"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Cardo Dalisay</td>
                                <td>10/20/1998</td>
                                <td>29-12</td>
                                <td>CICS</td>
                                <td>BSIT. 4rth Year</td>
                                <td class="text-right">
                                     <a class="m-0 btn btn-danger btn-sm" href="#"> View More <i class="fas fa-chevron-right"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <!---Container Fluid-->

@endsection