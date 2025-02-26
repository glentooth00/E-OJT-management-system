@extends('includes.layouts.app')

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
                        <Th>Status</Th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($endorsements as $endorsement)
                        <tr>
                            <td>{{ $endorsement->agency_personnel }}</td>
                            <td>{{ $endorsement->agency_name }}</td>
                            <td>
                                @if($endorsement->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    {{ $endorsement->status }}
                                @endif
                            </td>
                            <td>
                               
                                <a href=" {{ route('admin.endorsement.show', $endorsement->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('admin.endorsement.destroy', $endorsement->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this endorsement?')">Delete</button>
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
