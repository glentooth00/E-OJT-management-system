@extends('includes.layouts.app')


@section('content')
    <!-- Container Fluid-->
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
                <h1 class="mb-3">Categories</h1>
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAgencyModal">Add New
                    Category</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr>
                                <td>{{ $cat->category_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>


    <!-- Add Agency Modal -->
    <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addAgencyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAgencyModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf <!-- Add CSRF token field -->

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="organizationName">Category</label>
                                <input type="text" class="form-control" name="category_name" id="organizationName"
                                    placeholder="Category Name">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <!-- Change to submit button -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
@endsection
