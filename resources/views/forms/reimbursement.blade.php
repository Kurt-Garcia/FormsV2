@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-white bg-warning">
                        <h3 class="card-title mb-0">Reimbursement Form</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="expense_type" class="form-label">Expense Type</label>
                                <input type="text" class="form-control" id="expense_type" name="expense_type" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
