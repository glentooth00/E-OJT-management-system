@extends('includes.layouts.app')


@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Department Head</h1>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Account
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10%;">ID</th>
                                {{-- <th>Name</th> --}}
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Department</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal body content goes here -->
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Name</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Department</label>
                                    <select id="inputState" class="form-control">
                                        <option hidden>Select Dept.</option>
                                        <option>Education</option>
                                        <option>IICS</option>
                                        <option>Engineering</option>
                                    </select>
                                </div>

                            </div>
                            {{-- <div class="form-group">
                                <label for="inputAddress2">Office</label>
                                <input type="text" class="form-control" id=""
                                    placeholder="Ex. Municipal office, Bank, ">
                            </div> --}}
                            <div class="form-row">
                                {{-- <div class="form-group col-md-12">
                                    <label for="inputCity">Address</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div> --}}
                                {{-- <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div> --}}
                            </div>
                            {{-- <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button> --}}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Create Account</button>
                        <!-- Additional buttons or actions can be placed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!---Container Fluid-->
@endsection
<script>
    // $(document).ready(function() {
    //     $('#filterStatus').change(function() {
    //         var status = $(this).val(); // Get the selected status

    //         url = url.replace(':status', status);
    //         window.location.href = url; // Redirect to the filtered URL
    //     });
    // });
</script>
