<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Data</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="font-family: 'Helvetica', sans-serif; font-size: 40px; color: #000099;">Attendance Records</h1>
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Back to Data Lists</a>
            </div>

            @if($attendances->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->id }}</td>
                                    <td>{{ $attendance->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($attendance->status == 'Present') bg-success
                                            @elseif($attendance->status == 'Absent') bg-danger
                                            @elseif($attendance->status == 'Late') bg-warning
                                            @endif">
                                            {{ $attendance->status }}
                                        </span>
                                    </td>
                                    <td>{{ $attendance->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>No attendance records found</h4>
                    <p>No attendance data has been submitted yet.</p>
                </div>
            @endif
        </div>
    @endsection
    
</body>
</html>
