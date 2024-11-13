<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Form</title>

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-primary">GAISANO CAPITAL CORP FORMS</h1>
            <p class="text-center text-muted">Choose a form to fill out below:</p>
    
            <div class="row justify-content-center">
                
                <!-- Attendance Form Card (Opens in Modal) -->
                <div class="col-md-4 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#attendanceFormModal" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-primary text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-calendar-check text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Attendance Form</h5>
                        </div>
                    </a>
                </div>
    
                <!-- Itinerary Form Card (Opens in Modal) -->
                <div class="col-md-4 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#itineraryFormModal" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-info text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-geo-alt text-white"></i> <!-- White icon -->
                            </div>
                            <h5 class="card-title text-center">Itinerary Form</h5>
                        </div>
                    </a>
                </div>
    
                <!-- Reimbursement Form Card (Opens in Modal) -->
                <div class="col-md-4 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#reimbursementFormModal" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-success text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-cash-coin text-white"></i> <!-- White icon -->
                            </div>
                            <h5 class="card-title text-center">Reimbursement Form</h5>
                        </div>
                    </a>
                </div>


                <!-- Gate Pass Form Card (Opens in Modal) -->
                <div class="col-md-4 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#gatePassFormModal" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-warning text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-door-open text-white"></i> <!-- White icon -->
                            </div>
                            <h5 class="card-title text-center">Gate Pass Form</h5>
                        </div>
                    </a>
                </div>

                <!-- Excuse Form Card (Opens in Modal) -->
                <div class="col-md-4 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#excuseFormModal" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-danger text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-person-x text-white"></i> <!-- White icon -->
                            </div>
                            <h5 class="card-title text-center">Excuse Form</h5>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    
        <!-- Modal for Attendance Form -->
        <div class="modal fade" id="attendanceFormModal" tabindex="-1" aria-labelledby="attendanceFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="attendanceFormModalLabel">Attendance Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Attendance Form -->
                        <form action="{{ route('forms.attendance.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="attendance_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="attendance_date" name="attendance_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Late">Late</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal for Itinerary Form -->
        <div class="modal fade" id="itineraryFormModal" tabindex="-1" aria-labelledby="itineraryFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="itineraryFormModalLabel">Itinerary Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Itinerary Form -->
                        <form action="{{ route('forms.itinerary.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="itinerary_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="itinerary_date" name="itinerary_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" class="form-control" id="destination" name="destination" required>
                            </div>
                            <div class="mb-3">
                                <label for="purpose" class="form-label">Purpose</label>
                                <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
        <!-- Modal for Reimbursement Form -->
        <div class="modal fade" id="reimbursementFormModal" tabindex="-1" aria-labelledby="reimbursementFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reimbursementFormModalLabel">Reimbursement Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Reimbursement Form -->
                        <form action="{{ route('forms.reimbursement.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="reimbursement_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="reimbursement_date" name="reimbursement_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="expense_type" class="form-label">Expense Type</label>
                                <input type="text" class="form-control" id="expense_type" name="expense_type" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    <!-- Modal for Gate Pass Form -->
        <div class="modal fade" id="gatePassFormModal" tabindex="-1" aria-labelledby="gatePassFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gatePassFormModalLabel">Gate Pass Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Gate Pass Form -->
                        <form action="{{ route('forms.gatepass.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Gate Pass Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="time_in" class="form-label">Time In</label>
                                <input type="time" class="form-control" id="time_in" name="time_in" required>
                            </div>
                            <div class="mb-3">
                                <label for="time_out" class="form-label">Time Out</label>
                                <input type="time" class="form-control" id="time_out" name="time_out" required>
                            </div>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" class="form-control" id="destination" name="destination" required>
                            </div>
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason for Going Out</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal for Excuse Form -->
        <div class="modal fade" id="excuseFormModal" tabindex="-1" aria-labelledby="excuseFormModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="excuseFormModalLabel">Excuse Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Excuse Form -->
                        <form action="{{ route('forms.excuse.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="excuse_date" class="form-label">Date of Excuse</label>
                                <input type="date" class="form-control" id="excuse_date" name="excuse_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="kind_of_excuse" class="form-label">Kind of Excuse</label>
                                <select class="form-select" id="kind_of_excuse" name="kind_of_excuse" required>
                                    <option value="">Select Kind of Excuse</option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Personal Leave">Personal Leave</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason for Excuse</label>
                                <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection
    
</body>
</html>

