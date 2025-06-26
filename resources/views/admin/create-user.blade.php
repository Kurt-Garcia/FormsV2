@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="container-fluid">
        <!-- Header -->
        <div class="admin-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="admin-title">
                        <i class="bi bi-person-plus text-success"></i>
                        Add New User
                    </h1>
                    <p class="admin-subtitle">Create a new user or administrator account</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Back to Users
                    </a>
                </div>
            </div>
        </div>

        <!-- Create User Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h4><i class="bi bi-person-fill"></i> User Information</h4>
                        <p>Fill in the details to create a new user account</p>
                    </div>
                    <div class="admin-card-body">
                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">
                                            <i class="bi bi-person"></i>
                                            Full Name
                                        </label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name') }}" 
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">
                                            <i class="bi bi-envelope"></i>
                                            Email Address
                                        </label>
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               id="email" 
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">
                                            <i class="bi bi-lock"></i>
                                            Password
                                        </label>
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               id="password" 
                                               name="password" 
                                               required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Minimum 8 characters required</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            <i class="bi bi-lock-fill"></i>
                                            Confirm Password
                                        </label>
                                        <input type="password" 
                                               class="form-control" 
                                               id="password_confirmation" 
                                               name="password_confirmation" 
                                               required>
                                        <div class="form-text">Re-enter the password to confirm</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="role" class="form-label">
                                    <i class="bi bi-shield-check"></i>
                                    User Role
                                </label>
                                <select class="form-select @error('role') is-invalid @enderror" 
                                        id="role" 
                                        name="role" 
                                        required>
                                    <option value="">Select Role</option>
                                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>
                                        Regular User
                                    </option>
                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                                        Administrator
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    <strong>Regular User:</strong> Can submit forms and view their own data<br>
                                    <strong>Administrator:</strong> Can manage all users and approve/decline requests
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success btn-lg me-2">
                                    <i class="bi bi-check-circle"></i>
                                    Create User
                                </button>
                                <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-lg">
                                    <i class="bi bi-x-circle"></i>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
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

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 2px solid #ecf0f1;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    transition: border-color 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

.form-actions {
    text-align: center;
    padding-top: 1rem;
    border-top: 1px solid #ecf0f1;
}

.btn-success {
    background: linear-gradient(45deg, #27ae60, #229954);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
}

.btn-secondary {
    background: linear-gradient(45deg, #95a5a6, #7f8c8d);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 8px;
    font-weight: 600;
}

.btn-outline-secondary {
    border: 2px solid #95a5a6;
    color: #95a5a6;
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
}

.btn-outline-secondary:hover {
    background: #95a5a6;
    color: white;
}

.is-invalid {
    border-color: #e74c3c;
}

.invalid-feedback {
    color: #e74c3c;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>
@endsection
