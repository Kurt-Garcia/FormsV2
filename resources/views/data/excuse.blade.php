<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excuse Data</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="font-family: 'Helvetica', sans-serif; font-size: 40px; color: #000099;">Excuse Records</h1>
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Back to Data Lists</a>
            </div>

            @if($excuses->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Excuse Date</th>
                                <th>Kind of Excuse</th>
                                <th>Reason</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($excuses as $excuse)
                                <tr>
                                    <td>{{ $excuse->id }}</td>
                                    <td>{{ $excuse->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($excuse->excuse_date)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($excuse->kind_of_excuse == 'Sick Leave') bg-warning
                                            @elseif($excuse->kind_of_excuse == 'Personal Leave') bg-info
                                            @else bg-secondary
                                            @endif">
                                            {{ $excuse->kind_of_excuse }}
                                        </span>
                                    </td>
                                    <td>{{ Str::limit($excuse->reason, 50) }}</td>
                                    <td>{{ $excuse->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>No excuse records found</h4>
                    <p>No excuse data has been submitted yet.</p>
                </div>
            @endif
        </div>
    @endsection
    
</body>
</html>
