@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="container-fluid">
        <!-- Header -->
        <div class="admin-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="admin-title">
                        <i class="bi bi-people-fill text-success"></i>
                        User Management
                    </h1>
                    <p class="admin-subtitle">Manage system users and administrators</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-lg">
                        <i class="bi bi-person-plus"></i>
                        Add New User
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary ms-2">
                        <i class="bi bi-arrow-left"></i>
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Users Table -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h4><i class="bi bi-table"></i> All Users</h4>
                <p>Total users: {{ $users->total() }}</p>
            </div>
            <div class="admin-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <strong>{{ $user->name }}</strong>
                                        @if($user->id === Auth::id())
                                            <span class="badge bg-info ms-1">You</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-danger">Administrator</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($user->id !== Auth::id())
                                            <form method="POST" action="{{ route('admin.users.delete', $user) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <i class="bi bi-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted">Cannot delete own account</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="bi bi-people display-4 text-muted"></i>
                                        <p class="mt-2 text-muted">No users found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($users->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.admin-dashboard {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.admin-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.admin-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.admin-subtitle {
    color: #7f8c8d;
    font-size: 1.1rem;
    margin: 0;
}

.admin-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.admin-card-header {
    padding: 2rem 2rem 1rem;
    border-bottom: 1px solid #ecf0f1;
}

.admin-card-header h4 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.admin-card-header p {
    color: #7f8c8d;
    margin: 0;
}

.admin-card-body {
    padding: 2rem;
}

.btn-success {
    background: linear-gradient(45deg, #27ae60, #229954);
    border: none;
    color: white;
}

.btn-outline-secondary {
    border: 2px solid #95a5a6;
    color: #95a5a6;
}

.btn-outline-secondary:hover {
    background: #95a5a6;
    color: white;
}

.table th {
    font-weight: 600;
    border-top: none;
}

.table td {
    vertical-align: middle;
}

.badge {
    font-size: 0.75rem;
}
</style>
@endsection
