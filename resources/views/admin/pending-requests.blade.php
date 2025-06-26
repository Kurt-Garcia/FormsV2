@extends('layouts.app')

@section('content')
<div class="admin-pending-requests">
    <div class="container-fluid">
        <!-- Header -->
        <div class="admin-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="admin-title">
                        <i class="bi bi-clock-history text-warning"></i>
                        Pending Requests
                    </h1>
                    <p class="admin-subtitle">Review and approve form submissions</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Tabs -->
        <div class="admin-card">
            <ul class="nav nav-tabs admin-tabs" id="pendingTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="attendance-tab" data-bs-toggle="tab" data-bs-target="#attendance" type="button" role="tab">
                        <i class="bi bi-calendar-check"></i> Attendance <span class="badge bg-primary">{{ count($pendingRequests['attendance']) }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="itinerary-tab" data-bs-toggle="tab" data-bs-target="#itinerary" type="button" role="tab">
                        <i class="bi bi-geo-alt"></i> Itinerary <span class="badge bg-primary">{{ count($pendingRequests['itinerary']) }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reimbursement-tab" data-bs-toggle="tab" data-bs-target="#reimbursement" type="button" role="tab">
                        <i class="bi bi-cash-coin"></i> Reimbursement <span class="badge bg-primary">{{ count($pendingRequests['reimbursement']) }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gatepass-tab" data-bs-toggle="tab" data-bs-target="#gatepass" type="button" role="tab">
                        <i class="bi bi-door-open"></i> Gate Pass <span class="badge bg-primary">{{ count($pendingRequests['gatepass']) }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="excuse-tab" data-bs-toggle="tab" data-bs-target="#excuse" type="button" role="tab">
                        <i class="bi bi-person-x"></i> Excuse <span class="badge bg-primary">{{ count($pendingRequests['excuse']) }}</span>
                    </button>
                </li>
            </ul>

            <div class="tab-content admin-tab-content" id="pendingTabsContent">
                <!-- Attendance Tab -->
                <div class="tab-pane fade show active" id="attendance" role="tabpanel">
                    @include('admin.partials.pending-table', ['records' => $pendingRequests['attendance'], 'type' => 'attendance'])
                </div>

                <!-- Itinerary Tab -->
                <div class="tab-pane fade" id="itinerary" role="tabpanel">
                    @include('admin.partials.pending-table', ['records' => $pendingRequests['itinerary'], 'type' => 'itinerary'])
                </div>

                <!-- Reimbursement Tab -->
                <div class="tab-pane fade" id="reimbursement" role="tabpanel">
                    @include('admin.partials.pending-table', ['records' => $pendingRequests['reimbursement'], 'type' => 'reimbursement'])
                </div>

                <!-- Gate Pass Tab -->
                <div class="tab-pane fade" id="gatepass" role="tabpanel">
                    @include('admin.partials.pending-table', ['records' => $pendingRequests['gatepass'], 'type' => 'gatepass'])
                </div>

                <!-- Excuse Tab -->
                <div class="tab-pane fade" id="excuse" role="tabpanel">
                    @include('admin.partials.pending-table', ['records' => $pendingRequests['excuse'], 'type' => 'excuse'])
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Approval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modern-modal">
            <div class="modal-header">
                <div class="modal-icon approval-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="modal-title-wrapper">
                    <h5 class="modal-title">Approve Request</h5>
                    <p class="modal-subtitle">Add remarks (optional)</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="approvalForm">
                    <div class="form-group">
                        <label for="admin_remarks" class="form-label">Admin Remarks</label>
                        <textarea class="form-control" id="admin_remarks" name="admin_remarks" rows="3" placeholder="Add any remarks (optional)..."></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check2"></i> Approve
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Decline Modal -->
<div class="modal fade" id="declineModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modern-modal">
            <div class="modal-header">
                <div class="modal-icon decline-icon">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="modal-title-wrapper">
                    <h5 class="modal-title">Decline Request</h5>
                    <p class="modal-subtitle">Please provide reason for declining</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="declineForm">
                    <div class="form-group">
                        <label for="decline_remarks" class="form-label">Reason for Declining *</label>
                        <textarea class="form-control" id="decline_remarks" name="admin_remarks" rows="3" placeholder="Please provide reason for declining..." required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-x"></i> Decline
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.admin-pending-requests {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.admin-header {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.admin-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.admin-subtitle {
    color: #7f8c8d;
    font-size: 1.1rem;
    margin: 0;
}

.admin-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    overflow: hidden;
}

.admin-tabs {
    border-bottom: 2px solid #ecf0f1;
    padding: 0 2rem;
}

.admin-tabs .nav-link {
    border: none;
    color: #7f8c8d;
    font-weight: 600;
    padding: 1rem 1.5rem;
    border-radius: 0;
    transition: all 0.3s ease;
}

.admin-tabs .nav-link.active {
    color: #3498db;
    border-bottom: 3px solid #3498db;
    background: none;
}

.admin-tabs .nav-link:hover {
    color: #3498db;
}

.admin-tab-content {
    padding: 2rem;
}

.approval-icon {
    background: linear-gradient(45deg, #27ae60, #229954);
}

.decline-icon {
    background: linear-gradient(45deg, #e74c3c, #c0392b);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentType = '';
    let currentId = '';

    // Handle approve button clicks
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('approve-btn') || e.target.closest('.approve-btn')) {
            const btn = e.target.classList.contains('approve-btn') ? e.target : e.target.closest('.approve-btn');
            currentType = btn.dataset.type;
            currentId = btn.dataset.id;
            
            const modal = new bootstrap.Modal(document.getElementById('approvalModal'));
            modal.show();
        }

        if (e.target.classList.contains('decline-btn') || e.target.closest('.decline-btn')) {
            const btn = e.target.classList.contains('decline-btn') ? e.target : e.target.closest('.decline-btn');
            currentType = btn.dataset.type;
            currentId = btn.dataset.id;
            
            const modal = new bootstrap.Modal(document.getElementById('declineModal'));
            modal.show();
        }
    });

    // Handle approval form submission
    document.getElementById('approvalForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch(`/admin/approve/${currentType}/${currentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });

    // Handle decline form submission
    document.getElementById('declineForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch(`/admin/decline/${currentType}/${currentId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});
</script>
@endsection
