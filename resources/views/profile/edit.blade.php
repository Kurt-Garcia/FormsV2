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
            <h1 class="text-center mb-4" style="font-family: 'Helvetica', sans-serif; font-size: 50px; color: #000099;">Profile</h1>
            <p class="text-center text-muted">Choose a form to fill out below:</p> <br>
        
            <div class="row justify-content-center">
                <!-- Attendance Form Card (Redirect to another page) -->
                <div class="col-md-4 mb-4">
                    <!-- In edit.blade.php -->
                    <a href="{{ route('showAttendance.index') }}" class="card form-card text-decoration-none">
                        <div class="card-body">
                            <div class="icon-container bg-primary text-dark rounded-circle mb-3 mx-auto">
                                <i class="bi bi-calendar-check text-white"></i>
                            </div>
                            <h5 class="card-title text-center">Attendance Form</h5>
                        </div>
                    </a>
                </div>

                <!-- You can add similar cards for other forms here -->

            </div>
        </div>
    @endsection
    
</body>
</html>

