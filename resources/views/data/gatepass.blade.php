<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gate Pass Data</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="font-family: 'Helvetica', sans-serif; font-size: 40px; color: #000099;">Gate Pass Records</h1>
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Back to Data Lists</a>
            </div>

            @if($gatePasses->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Destination</th>
                                <th>Reason</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gatePasses as $gatePass)
                                <tr>
                                    <td>{{ $gatePass->id }}</td>
                                    <td>{{ $gatePass->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($gatePass->date)->format('M d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($gatePass->time_in)->format('h:i A') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($gatePass->time_out)->format('h:i A') }}</td>
                                    <td>{{ $gatePass->destination }}</td>
                                    <td>{{ Str::limit($gatePass->reason, 50) }}</td>
                                    <td>{{ $gatePass->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>No gate pass records found</h4>
                    <p>No gate pass data has been submitted yet.</p>
                </div>
            @endif
        </div>
    @endsection
    
</body>
</html>
