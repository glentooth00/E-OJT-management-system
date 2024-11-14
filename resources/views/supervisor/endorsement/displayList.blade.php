@extends('includes.layouts.supervisor')

@section('page-title', 'Endorsements')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Endorsement List</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success text-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card Wrapper -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Endorsements</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Agency Personnel</th>
                        <th>Agency Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($endorsements as $endorsement)
                        <tr>
                            <td>{{ $endorsement->agency_personnel }}</td>
                            <td>{{ $endorsement->agency_name }}</td>
                            <td>
                                <!-- View Letter -->
                                <a href="  {{ route('supervisor.endorsement.show', $endorsement->id) }} " class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                              
                                <!-- Delete Form -->
                                {{-- {{ route('supervisor.endorsement.destroy', $endorsement->id) }} --}}
                                <form action="" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this endorsement?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
