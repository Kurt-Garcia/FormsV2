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
<div class="container">
    <h1 class="text-center mb-5">Form Data</h1>
    
    <!-- Cards for each form type -->
    <a href="#" class="card form-card" data-bs-toggle="modal" data-bs-target="#formModal" data-form="att">
        <div class="card-body">
            <div class="icon-container bg-primary text-dark rounded-circle mb-3 mx-auto">
                <i class="bi bi-calendar-check text-white"></i>
            </div>
            <h5 class="card-title text-center">Attendance Form</h5>
        </div>
    </a>

    <a href="#" class="card form-card" data-bs-toggle="modal" data-bs-target="#formModal" data-form="itn">
        <div class="card-body">
            <div class="icon-container bg-info text-dark rounded-circle mb-3 mx-auto">
                <i class="bi bi-geo-alt text-white"></i>
            </div>
            <h5 class="card-title text-center">Itinerary Form</h5>
        </div>
    </a>

    <a href="#" class="card form-card" data-bs-toggle="modal" data-bs-target="#formModal" data-form="reb">
        <div class="card-body">
            <div class="icon-container bg-success text-dark rounded-circle mb-3 mx-auto">
                <i class="bi bi-cash-coin text-white"></i>
            </div>
            <h5 class="card-title text-center">Reimbursement Form</h5>
        </div>
    </a>

    <a href="#" class="card form-card" data-bs-toggle="modal" data-bs-target="#formModal" data-form="gpp">
        <div class="card-body">
            <div class="icon-container bg-warning text-dark rounded-circle mb-3 mx-auto">
                <i class="bi bi-door-open text-white"></i>
            </div>
            <h5 class="card-title text-center">Gate Pass Form</h5>
        </div>
    </a>

    <a href="#" class="card form-card" data-bs-toggle="modal" data-bs-target="#formModal" data-form="exc">
        <div class="card-body">
            <div class="icon-container bg-danger text-dark rounded-circle mb-3 mx-auto">
                <i class="bi bi-emoji-sunglasses text-white"></i>
            </div>
            <h5 class="card-title text-center">Excuse Form</h5>
        </div>
    </a>
    
    <!-- Modal -->
    <div id="formModal" class="modal fade" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Form Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-content" class="table-responsive text-center">
                        <p>Loading...</p> <!-- Initial loading message -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // When the modal is triggered, load data for the selected form
    $('#formModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var formType = button.data('form'); // Extract info from data-* attributes

        // Define the URL based on the form type (attendance, itinerary, etc.)
        var url = '';
        var modalTitle = ''; // Variable to hold the modal title

        switch (formType) {
            case 'att':
                url = '/att'; // Route to get attendance data
                modalTitle = 'Attendance List'; // Modal title for Attendance
                break;
            case 'itn':
                url = '/itn'; // Route to get itinerary data
                modalTitle = 'Itinerary List'; // Modal title for Itinerary
                break;
            case 'reb':
                url = '/reb'; // Route to get reimbursement data
                modalTitle = 'Reimbursement List'; // Modal title for Reimbursement
                break;
            case 'gpp':
                url = '/gpp'; // Route to get gate pass data
                modalTitle = 'Gate Pass List'; // Modal title for Gate Pass
                break;
            case 'exc':
                url = '/exc'; // Route to get excuse data
                modalTitle = 'Excuse List'; // Modal title for Excuse
                break;
            default:
                url = '/'; // Default route (fallback)
                modalTitle = 'Form Data'; // Default title
                break;
        }

        // Update the modal title (this is important)
        $('#formModalLabel').text(modalTitle);

        // Display a "Loading..." message while waiting for the data
        $('#modal-content').html('<p>Loading...</p>');

        // Fetch data via AJAX
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                // Check if the response array is empty
                if (response.length === 0) {
                    $('#modal-content').html('<p>No data available for this form.</p>');
                    return; // Exit the function if no data
                }

                var htmlContent = '<table class="table table-striped"><thead><tr>';

                // Dynamically generate the table header based on form type
                if (formType == 'att') {
                    htmlContent += '<th>Employee Name</th><th>Date</th><th>Status</th>';
                } else if (formType == 'itn') {
                    htmlContent += '<th>Employee Name</th><th>Date</th><th>Destination</th><th>Purpose</th>';
                } else if (formType == 'reb') {
                    htmlContent += '<th>Employee Name</th><th>Date</th><th>Expense Type</th><th>Amount</th><th>Description</th>';
                } else if (formType == 'gpp') {
                    htmlContent += '<th>Employee Name</th><th>Date</th><th>Time In</th><th>Time Out</th><th>Destination</th><th>Reason</th>';
                } else if (formType == 'exc') {
                    htmlContent += '<th>Employee Name</th><th>Date</th><th>Kind of Excuse</th><th>Reason</th>';
                }

                htmlContent += '</tr></thead><tbody>';

                // Populate the table rows with the response data
                $.each(response, function (index, data) {
                    htmlContent += '<tr>';

                    // Dynamically generate the rows based on the form type
                    if (formType == 'att') {
                        htmlContent += '<td>' + data.employee_name + '</td><td>' + data.attendance_date + '</td><td>' + data.status + '</td>';
                    } else if (formType == 'itn') {
                        htmlContent += '<td>' + data.employee_name + '</td><td>' + data.itinerary_date + '</td><td>' + data.destination + '</td><td>' + data.purpose + '</td>';
                    } else if (formType == 'reb') {
                        htmlContent += '<td>' + data.employee_name + '</td><td>' + data.reimbursement_date + '</td><td>' + data.expense_type + '</td><td>' + data.amount + '</td><td>' + data.description + '</td>';
                    } else if (formType == 'gpp') {
                        htmlContent += '<td>' + data.employee_name + '</td><td>' + data.gatepass_date + '</td><td>' + data.time_in + '</td><td>' + data.time_out + '</td><td>' + data.destination + '</td><td>' + data.reason + '</td>';
                    } else if (formType == 'exc') {
                        htmlContent += '<td>' + data.employee_name + '</td><td>' + data.excuse_date + '</td><td>' + data.excuse_type + '</td><td>' + data.reason + '</td>';
                    }

                    htmlContent += '</tr>';
                });

                htmlContent += '</tbody></table>';
                $('#modal-content').html(htmlContent); // Inject the table into the modal
            },
            error: function (error) {
                // Handle error case
                console.error('Error fetching data:', error);
                $('#modal-content').html('<p>Error loading data.</p>');
            }
        });
    });
});



</script>
@endsection
</body>
</html>

