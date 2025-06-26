@extends('layouts.app')

@section('content')
<div class="admin-dashboard">
    <div class="container-fluid">
        <!-- Admin Header -->
        <div class="admin-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="admin-title">
                        <i class="bi bi-shield-check text-primary"></i>
                        Admin Dashboard
                    </h1>
                    <p class="admin-subtitle">Manage form submissions and user requests</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="admin-user-info">
                        <span class="admin-welcome">Welcome back, {{ Auth::user()->name }}</span>
                        <span class="admin-role-badge">Administrator</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card pending-card">
                    <div class="stats-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['pending_attendance'] }}</h3>
                        <p>Pending Attendance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card pending-card">
                    <div class="stats-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['pending_itinerary'] }}</h3>
                        <p>Pending Itinerary</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card pending-card">
                    <div class="stats-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['pending_reimbursement'] }}</h3>
                        <p>Pending Reimbursement</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card pending-card">
                    <div class="stats-icon">
                        <i class="bi bi-door-open"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['pending_gatepass'] }}</h3>
                        <p>Pending Gate Pass</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card pending-card">
                    <div class="stats-icon">
                        <i class="bi bi-person-x"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['pending_excuse'] }}</h3>
                        <p>Pending Excuses</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="stats-card users-card">
                    <div class="stats-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stats-content">
                        <h3>{{ $stats['total_users'] }}</h3>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h4><i class="bi bi-clock-history"></i> Pending Requests</h4>
                        <p>Review and approve pending form submissions</p>
                    </div>
                    <div class="admin-card-body">
                        <a href="{{ route('admin.pending-requests') }}" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-eye"></i>
                            View Pending Requests
                            @if(array_sum($stats) - $stats['total_users'] > 0)
                                <span class="badge bg-warning ms-2">{{ array_sum($stats) - $stats['total_users'] }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h4><i class="bi bi-archive"></i> All Records</h4>
                        <p>Browse all form submissions and their status</p>
                    </div>
                    <div class="admin-card-body">
                        <a href="{{ route('admin.all-records') }}" class="btn btn-secondary btn-lg w-100">
                            <i class="bi bi-table"></i>
                            View All Records
                        </a>
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

.admin-user-info {
    text-align: right;
}

.admin-welcome {
    display: block;
    font-size: 1.1rem;
    color: #2c3e50;
    font-weight: 600;
}

.admin-role-badge {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-top: 0.5rem;
    display: inline-block;
}

.stats-card {
    background: white;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.pending-card {
    border-left: 4px solid #e74c3c;
}

.users-card {
    border-left: 4px solid #27ae60;
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    background: linear-gradient(45deg, #3498db, #2980b9);
}

.pending-card .stats-icon {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
}

.users-card .stats-icon {
    background: linear-gradient(45deg, #27ae60, #229954);
}

.stats-content h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
}

.stats-content p {
    color: #7f8c8d;
    margin: 0;
    font-size: 0.9rem;
    font-weight: 500;
}

.admin-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    height: 100%;
}

.admin-card:hover {
    transform: translateY(-5px);
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
    padding: 1rem 2rem 2rem;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(45deg, #3498db, #2980b9);
    border: none;
}

.btn-secondary {
    background: linear-gradient(45deg, #95a5a6, #7f8c8d);
    border: none;
}

.btn-lg:hover {
    transform: scale(1.02);
}

.badge {
    font-size: 0.75rem;
}
</style>
@endsection
