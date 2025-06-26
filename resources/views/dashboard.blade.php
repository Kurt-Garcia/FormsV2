<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FormsV2 - Digital Workplace</title>

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="modern-dashboard">

    @extends('layouts.app')

    @section('content')
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-badge">
                        <i class="bi bi-building-check"></i>
                        <span>Digital Workplace</span>
                    </div>
                    <h1 class="hero-title">
                        <span class="gradient-text">Fast Distribution</span>
                        <span class="hero-subtitle">Corporation</span>
                    </h1>
                    <p class="hero-description">
                        Streamline your workflow with our modern digital forms platform. 
                        Submit requests, track attendance, and manage documentation efficiently.
                    </p>
                </div>
            </div>
        </div>

        <!-- Forms Grid Section -->
        <div class="forms-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Quick Actions</h2>
                    <p class="section-subtitle">Choose a form to get started</p>
                </div>
                
                <div class="forms-grid">
                    <!-- Attendance Form Card -->
                    <div class="form-card attendance-card" data-bs-toggle="modal" data-bs-target="#attendanceFormModal">
                        <div class="card-icon">
                            <div class="icon-wrapper attendance-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Attendance</h3>
                            <p class="card-description">Record daily attendance and track work hours</p>
                            <div class="card-actions">
                                <button class="btn-primary">Create New</button>
                                <a href="{{ route('data.attendance') }}" class="btn-secondary" onclick="event.stopPropagation();">View Records</a>
                            </div>
                        </div>
                        <div class="card-pattern"></div>
                    </div>

                    <!-- Itinerary Form Card -->
                    <div class="form-card itinerary-card" data-bs-toggle="modal" data-bs-target="#itineraryFormModal">
                        <div class="card-icon">
                            <div class="icon-wrapper itinerary-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Itinerary</h3>
                            <p class="card-description">Plan and document business travel schedules</p>
                            <div class="card-actions">
                                <button class="btn-primary">Create New</button>
                                <a href="{{ route('data.itinerary') }}" class="btn-secondary" onclick="event.stopPropagation();">View Records</a>
                            </div>
                        </div>
                        <div class="card-pattern"></div>
                    </div>

                    <!-- Reimbursement Form Card -->
                    <div class="form-card reimbursement-card" data-bs-toggle="modal" data-bs-target="#reimbursementFormModal">
                        <div class="card-icon">
                            <div class="icon-wrapper reimbursement-icon">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Reimbursement</h3>
                            <p class="card-description">Submit expense claims and reimbursement requests</p>
                            <div class="card-actions">
                                <button class="btn-primary">Create New</button>
                                <a href="{{ route('data.reimbursement') }}" class="btn-secondary" onclick="event.stopPropagation();">View Records</a>
                            </div>
                        </div>
                        <div class="card-pattern"></div>
                    </div>

                    <!-- Gate Pass Form Card -->
                    <div class="form-card gatepass-card" data-bs-toggle="modal" data-bs-target="#gatePassFormModal">
                        <div class="card-icon">
                            <div class="icon-wrapper gatepass-icon">
                                <i class="bi bi-door-open"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Gate Pass</h3>
                            <p class="card-description">Request permission for entry and exit</p>
                            <div class="card-actions">
                                <button class="btn-primary">Create New</button>
                                <a href="{{ route('data.gatepass') }}" class="btn-secondary" onclick="event.stopPropagation();">View Records</a>
                            </div>
                        </div>
                        <div class="card-pattern"></div>
                    </div>

                    <!-- Excuse Form Card -->
                    <div class="form-card excuse-card" data-bs-toggle="modal" data-bs-target="#excuseFormModal">
                        <div class="card-icon">
                            <div class="icon-wrapper excuse-icon">
                                <i class="bi bi-person-x"></i>
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">Excuse Letter</h3>
                            <p class="card-description">Submit absence requests and leave applications</p>
                            <div class="card-actions">
                                <button class="btn-primary">Create New</button>
                                <a href="{{ route('data.excuse') }}" class="btn-secondary" onclick="event.stopPropagation();">View Records</a>
                            </div>
                        </div>
                        <div class="card-pattern"></div>
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
    
</body>
</html>

