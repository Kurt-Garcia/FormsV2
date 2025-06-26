<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Lists</title>

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <h1 class="text-center mb-4" style="font-family: 'Helvetica', sans-serif; font-size: 50px; color: #000099;">Data Lists</h1>

            <p class="text-center text-muted">Select a data type to view records:</p> <br>
    
            <div class="row justify-content-center">
                
                <!-- Attendance Data Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('data.attendance') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-primary text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-calendar-check text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Attendance Data</h5>
                        </div>
                    </a>
                </div>
    
                <!-- Itinerary Data Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('data.itinerary') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-info text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-geo-alt text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Itinerary Data</h5>
                        </div>
                    </a>
                </div>
    
                <!-- Reimbursement Data Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('data.reimbursement') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-success text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-cash-coin text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Reimbursement Data</h5>
                        </div>
                    </a>
                </div>

                <!-- Gate Pass Data Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('data.gatepass') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-warning text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-door-open text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Gate Pass Data</h5>
                        </div>
                    </a>
                </div>

                <!-- Excuse Data Card -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('data.excuse') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-danger text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-person-x text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Excuse Data</h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    @endsection
    
</body>
</html>
