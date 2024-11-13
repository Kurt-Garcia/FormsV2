@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-white bg-success">
                        <h3 class="card-title mb-0">Itinerary Form</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" class="form-control" id="destination" name="destination" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date" class="form-label">Date of Travel</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
