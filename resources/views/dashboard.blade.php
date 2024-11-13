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
        <h1 class="text-center mb-4">Forms Dashboard</h1>
        <p class="text-center text-muted">Choose a form to fill out below:</p>

        <div class="row justify-content-center">
            
            <!-- Attendance Form Card -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('forms.attendance') }}" class="card form-card shadow-sm border-0 text-center text-decoration-none">
                    <div class="card-body">
                        <div class="icon-container bg-primary text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h5 class="card-title">Attendance Form</h5>
                        <p class="card-text text-muted">Record your attendance details here.</p>
                    </div>
                </a>
            </div>

            <!-- Itinerary Form Card -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('forms.itinerary') }}" class="card form-card shadow-sm border-0 text-center text-decoration-none">
                    <div class="card-body">
                        <div class="icon-container bg-success text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-map"></i>
                        </div>
                        <h5 class="card-title">Itinerary Form</h5>
                        <p class="card-text text-muted">Plan your travel itinerary here.</p>
                    </div>
                </a>
            </div>

            <!-- Reimbursement Form Card -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('forms.reimbursement') }}" class="card form-card shadow-sm border-0 text-center text-decoration-none">
                    <div class="card-body">
                        <div class="icon-container bg-warning text-white rounded-circle mb-3 mx-auto">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h5 class="card-title">Reimbursement Form</h5>
                        <p class="card-text text-muted">Request your reimbursements here.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection


</body>
</html>

