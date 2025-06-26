<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Itinerary Data</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="font-family: 'Helvetica', sans-serif; font-size: 40px; color: #000099;">Itinerary Records</h1>
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Back to Data Lists</a>
            </div>

            @if($itineraries->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Destination</th>
                                <th>Purpose</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($itineraries as $itinerary)
                                <tr>
                                    <td>{{ $itinerary->id }}</td>
                                    <td>{{ $itinerary->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($itinerary->itinerary_date)->format('M d, Y') }}</td>
                                    <td>{{ $itinerary->destination }}</td>
                                    <td>{{ Str::limit($itinerary->purpose, 50) }}</td>
                                    <td>{{ $itinerary->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>No itinerary records found</h4>
                    <p>No itinerary data has been submitted yet.</p>
                </div>
            @endif
        </div>
    @endsection
    
</body>
</html>
