<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reimbursement Data</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 style="font-family: 'Helvetica', sans-serif; font-size: 40px; color: #000099;">Reimbursement Records</h1>
                <a href="{{ route('data.index') }}" class="btn btn-secondary">Back to Data Lists</a>
            </div>

            @if($reimbursements->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th>Expense Type</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reimbursements as $reimbursement)
                                <tr>
                                    <td>{{ $reimbursement->id }}</td>
                                    <td>{{ $reimbursement->employee_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reimbursement->reimbursement_date)->format('M d, Y') }}</td>
                                    <td>{{ $reimbursement->expense_type }}</td>
                                    <td>₱{{ number_format($reimbursement->amount, 2) }}</td>
                                    <td>{{ Str::limit($reimbursement->description, 50) }}</td>
                                    <td>{{ $reimbursement->created_at->format('M d, Y h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <h4>No reimbursement records found</h4>
                    <p>No reimbursement data has been submitted yet.</p>
                </div>
            @endif
        </div>
    @endsection
    
</body>
</html>
