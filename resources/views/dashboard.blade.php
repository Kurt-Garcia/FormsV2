@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="dashboard-container">
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="dashboard-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="dashboard-title">
                        <i class="bi bi-speedometer2 text-primary"></i>
                        Digital Workplace
                    </h1>
                    <p class="dashboard-subtitle">Fast Distribution Corporation - Forms Management System</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="user-info">
                        <span class="welcome-text">Welcome, {{ Auth::user()->name ?? 'User' }}</span>
                        <span class="user-badge">Employee</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Forms Grid -->
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="form-card attendance-card" data-bs-toggle="modal" data-bs-target="#attendanceFormModal">
                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h4>Attendance</h4>
                        <p>Record daily attendance and track work hours</p>
                    </div>
                    <div class="form-card-body">
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-plus-circle"></i>
                            Create New
                        </button>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('data.attendance') }}" class="btn btn-outline-primary mt-2 w-100" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye"></i> View Records
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="form-card itinerary-card" data-bs-toggle="modal" data-bs-target="#itineraryFormModal">
                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h4>Itinerary</h4>
                        <p>Plan and document business travel schedules</p>
                    </div>
                    <div class="form-card-body">
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-plus-circle"></i>
                            Create New
                        </button>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('data.itinerary') }}" class="btn btn-outline-primary mt-2 w-100" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye"></i> View Records
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="form-card reimbursement-card" data-bs-toggle="modal" data-bs-target="#reimbursementFormModal">
                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <h4>Reimbursement</h4>
                        <p>Submit expense claims and reimbursement requests</p>
                    </div>
                    <div class="form-card-body">
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-plus-circle"></i>
                            Create New
                        </button>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('data.reimbursement') }}" class="btn btn-outline-primary mt-2 w-100" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye"></i> View Records
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="form-card gatepass-card" data-bs-toggle="modal" data-bs-target="#gatePassFormModal">
                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <h4>Gate Pass</h4>
                        <p>Request permission for entry and exit</p>
                    </div>
                    <div class="form-card-body">
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-plus-circle"></i>
                            Create New
                        </button>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('data.gatepass') }}" class="btn btn-outline-primary mt-2 w-100" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye"></i> View Records
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="form-card excuse-card" data-bs-toggle="modal" data-bs-target="#excuseFormModal">
                    <div class="form-card-header">
                        <div class="form-icon">
                            <i class="bi bi-person-x"></i>
                        </div>
                        <h4>Excuse Letter</h4>
                        <p>Submit absence requests and leave applications</p>
                    </div>
                    <div class="form-card-body">
                        <button class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-plus-circle"></i>
                            Create New
                        </button>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('data.excuse') }}" class="btn btn-outline-primary mt-2 w-100" onclick="event.stopPropagation();">
                                    <i class="bi bi-eye"></i> View Records
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
        <!-- Modern Modal for Attendance Form -->
        <div class="modal fade" id="attendanceFormModal" tabindex="-1" aria-labelledby="attendanceFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modern-modal">
                    <div class="modal-header">
                        <div class="modal-icon attendance-modal-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="modal-title-wrapper">
                            <h5 class="modal-title" id="attendanceFormModalLabel">Attendance Form</h5>
                            <p class="modal-subtitle">Record your daily attendance</p>
                        </div>
                        <button type="button" class="btn-close modern-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('forms.attendance.submit') }}" method="POST" class="modern-form">
                            @csrf
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="employee_name" name="employee_name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="attendance_date" class="form-label">Date</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control modern-input" id="attendance_date" name="attendance_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-check-circle input-icon"></i>
                                    <select class="form-control modern-input" id="status" name="status" required>
                                        <option value="">Select status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Late">Late</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check2"></i>
                                    Submit Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modern Modal for Itinerary Form -->
        <div class="modal fade" id="itineraryFormModal" tabindex="-1" aria-labelledby="itineraryFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modern-modal">
                    <div class="modal-header">
                        <div class="modal-icon itinerary-modal-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="modal-title-wrapper">
                            <h5 class="modal-title" id="itineraryFormModalLabel">Itinerary Form</h5>
                            <p class="modal-subtitle">Plan your business travel</p>
                        </div>
                        <button type="button" class="btn-close modern-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('forms.itinerary.submit') }}" method="POST" class="modern-form">
                            @csrf
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="employee_name" name="employee_name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="itinerary_date" class="form-label">Travel Date</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control modern-input" id="itinerary_date" name="itinerary_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="destination" class="form-label">Destination</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-geo-alt input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="destination" name="destination" placeholder="Enter destination city/location" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="purpose" class="form-label">Purpose of Travel</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-clipboard input-icon"></i>
                                    <textarea class="form-control modern-input" id="purpose" name="purpose" rows="3" placeholder="Describe the purpose of your travel..." required></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check2"></i>
                                    Submit Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
        <!-- Modern Modal for Reimbursement Form -->
        <div class="modal fade" id="reimbursementFormModal" tabindex="-1" aria-labelledby="reimbursementFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modern-modal">
                    <div class="modal-header">
                        <div class="modal-icon reimbursement-modal-icon">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="modal-title-wrapper">
                            <h5 class="modal-title" id="reimbursementFormModalLabel">Reimbursement Form</h5>
                            <p class="modal-subtitle">Submit your expense claims</p>
                        </div>
                        <button type="button" class="btn-close modern-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('forms.reimbursement.submit') }}" method="POST" class="modern-form">
                            @csrf
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="employee_name" name="employee_name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reimbursement_date" class="form-label">Expense Date</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control modern-input" id="reimbursement_date" name="reimbursement_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="expense_type" class="form-label">Expense Type</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-tag input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="expense_type" name="expense_type" placeholder="e.g., Travel, Meals, Accommodation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="form-label">Amount</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-currency-dollar input-icon"></i>
                                    <input type="number" class="form-control modern-input" id="amount" name="amount" placeholder="0.00" step="0.01" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-clipboard input-icon"></i>
                                    <textarea class="form-control modern-input" id="description" name="description" rows="3" placeholder="Provide details about the expense..." required></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check2"></i>
                                    Submit Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        <!-- Modern Modal for Gate Pass Form -->
        <div class="modal fade" id="gatePassFormModal" tabindex="-1" aria-labelledby="gatePassFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modern-modal">
                    <div class="modal-header">
                        <div class="modal-icon gatepass-modal-icon">
                            <i class="bi bi-door-open"></i>
                        </div>
                        <div class="modal-title-wrapper">
                            <h5 class="modal-title" id="gatePassFormModalLabel">Gate Pass Form</h5>
                            <p class="modal-subtitle">Request entry/exit permission</p>
                        </div>
                        <button type="button" class="btn-close modern-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('forms.gatepass.submit') }}" method="POST" class="modern-form">
                            @csrf
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="employee_name" name="employee_name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label">Gate Pass Date</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control modern-input" id="date" name="date" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="time_in" class="form-label">Time In</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-clock input-icon"></i>
                                        <input type="time" class="form-control modern-input" id="time_in" name="time_in" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="time_out" class="form-label">Time Out</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-clock input-icon"></i>
                                        <input type="time" class="form-control modern-input" id="time_out" name="time_out" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="destination" class="form-label">Destination</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-geo-alt input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="destination" name="destination" placeholder="Where are you going?" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reason" class="form-label">Reason for Going Out</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-clipboard input-icon"></i>
                                    <textarea class="form-control modern-input" id="reason" name="reason" rows="3" placeholder="Please specify the reason..." required></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check2"></i>
                                    Submit Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        <!-- Modern Modal for Excuse Form -->
        <div class="modal fade" id="excuseFormModal" tabindex="-1" aria-labelledby="excuseFormModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modern-modal">
                    <div class="modal-header">
                        <div class="modal-icon excuse-modal-icon">
                            <i class="bi bi-person-x"></i>
                        </div>
                        <div class="modal-title-wrapper">
                            <h5 class="modal-title" id="excuseFormModalLabel">Excuse Letter Form</h5>
                            <p class="modal-subtitle">Submit your leave request</p>
                        </div>
                        <button type="button" class="btn-close modern-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('forms.excuse.submit') }}" method="POST" class="modern-form">
                            @csrf
                            <div class="form-group">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control modern-input" id="employee_name" name="employee_name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="excuse_date" class="form-label">Date of Absence</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control modern-input" id="excuse_date" name="excuse_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kind_of_excuse" class="form-label">Type of Leave</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-list-ul input-icon"></i>
                                    <select class="form-control modern-input" id="kind_of_excuse" name="kind_of_excuse" required>
                                        <option value="">Select leave type</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Personal Leave">Personal Leave</option>
                                        <option value="Emergency Leave">Emergency Leave</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reason" class="form-label">Reason for Absence</label>
                                <div class="input-wrapper">
                                    <i class="bi bi-clipboard input-icon"></i>
                                    <textarea class="form-control modern-input" id="reason" name="reason" rows="3" placeholder="Please provide details about your absence..." required></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check2"></i>
                                    Submit Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

<style>
.dashboard-container {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.dashboard-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.dashboard-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.dashboard-subtitle {
    color: #7f8c8d;
    font-size: 1.1rem;
    margin: 0;
}

.user-info {
    text-align: right;
}

.welcome-text {
    display: block;
    font-size: 1.1rem;
    color: #2c3e50;
    font-weight: 600;
}

.user-badge {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-top: 0.5rem;
    display: inline-block;
}

.form-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    height: 100%;
    border-left: 4px solid #3498db;
}

.form-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.attendance-card {
    border-left-color: #e74c3c;
}

.itinerary-card {
    border-left-color: #f39c12;
}

.reimbursement-card {
    border-left-color: #27ae60;
}

.gatepass-card {
    border-left-color: #9b59b6;
}

.excuse-card {
    border-left-color: #34495e;
}

.form-card-header {
    padding: 2rem 2rem 1rem;
    border-bottom: 1px solid #ecf0f1;
}

.form-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    background: linear-gradient(45deg, #3498db, #2980b9);
    margin-bottom: 1rem;
}

.attendance-card .form-icon {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
}

.itinerary-card .form-icon {
    background: linear-gradient(45deg, #f39c12, #e67e22);
}

.reimbursement-card .form-icon {
    background: linear-gradient(45deg, #27ae60, #229954);
}

.gatepass-card .form-icon {
    background: linear-gradient(45deg, #9b59b6, #8e44ad);
}

.excuse-card .form-icon {
    background: linear-gradient(45deg, #34495e, #2c3e50);
}

.form-card-header h4 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.form-card-header p {
    color: #7f8c8d;
    margin: 0;
}

.form-card-body {
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
    color: white;
}

.btn-outline-primary {
    border: 2px solid #3498db;
    color: #3498db;
    background: transparent;
}

.btn-outline-primary:hover {
    background: #3498db;
    color: white;
    border-color: #3498db;
}

.btn-lg:hover {
    transform: scale(1.02);
}

/* Modal Styles */
.modern-modal {
    border-radius: 15px;
    border: none;
    overflow: hidden;
}

.modern-modal .modal-header {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    padding: 2rem;
    border-bottom: none;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.modal-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.modal-title-wrapper {
    flex: 1;
}

.modal-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin: 0;
}

.modal-subtitle {
    font-size: 0.9rem;
    opacity: 0.9;
    margin: 0;
}

.modern-close {
    background: rgba(255,255,255,0.2);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.modern-close:hover {
    background: rgba(255,255,255,0.3);
}

.modal-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    display: block;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #7f8c8d;
    z-index: 2;
}

.modern-input {
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid #ecf0f1;
    border-radius: 10px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
    width: 100%;
}

.modern-input:focus {
    border-color: #3498db;
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #ecf0f1;
}

.btn-cancel {
    background: #95a5a6;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: #7f8c8d;
}

.btn-submit {
    background: linear-gradient(45deg, #27ae60, #229954);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-submit:hover {
    transform: scale(1.02);
}

/* Specific modal header colors */
.attendance-modal-icon {
    background: rgba(231, 76, 60, 0.2);
}

.itinerary-modal-icon {
    background: rgba(243, 156, 18, 0.2);
}

.reimbursement-modal-icon {
    background: rgba(39, 174, 96, 0.2);
}

.gatepass-modal-icon {
    background: rgba(155, 89, 182, 0.2);
}

.excuse-modal-icon {
    background: rgba(52, 73, 94, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .dashboard-title {
        font-size: 2rem;
    }
    
    .dashboard-header {
        padding: 1.5rem;
    }
    
    .form-card-header {
        padding: 1.5rem 1.5rem 1rem;
    }
    
    .form-card-body {
        padding: 1rem 1.5rem 1.5rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
}
</style>

