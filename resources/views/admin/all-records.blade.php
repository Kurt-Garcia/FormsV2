@extends('layouts.app')

@section('content')
<div class="admin-all-records">
    <div class="container-fluid">
        <!-- Header -->
        <div class="admin-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="admin-title">
                        <i class="bi bi-archive text-info"></i>
                        All Records
                    </h1>
                    <p class="admin-subtitle">Browse and manage all form submissions</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="admin-card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="type" class="form-label">Form Type</label>
                        <select name="type" id="type" class="form-select">
                            <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All Forms</option>
                            <option value="attendance" {{ $type === 'attendance' ? 'selected' : '' }}>Attendance</option>
                            <option value="itinerary" {{ $type === 'itinerary' ? 'selected' : '' }}>Itinerary</option>
                            <option value="reimbursement" {{ $type === 'reimbursement' ? 'selected' : '' }}>Reimbursement</option>
                            <option value="gatepass" {{ $type === 'gatepass' ? 'selected' : '' }}>Gate Pass</option>
                            <option value="excuse" {{ $type === 'excuse' ? 'selected' : '' }}>Excuse</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="status" class="form-label">Approval Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                            <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="declined" {{ $status === 'declined' ? 'selected' : '' }}>Declined</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-funnel"></i> Apply Filters
                        </button>
                        <a href="{{ route('admin.all-records') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Records Display -->
        <div class="admin-card">
            @if(!empty($records))
                <ul class="nav nav-tabs admin-tabs" id="recordsTabs" role="tablist">
                    @php $firstTab = true; @endphp
                    @foreach($records as $recordType => $recordList)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $firstTab ? 'active' : '' }}" 
                                    id="{{ $recordType }}-tab" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#{{ $recordType }}" 
                                    type="button" role="tab">
                                <i class="bi bi-{{ $recordType === 'attendance' ? 'calendar-check' : ($recordType === 'itinerary' ? 'geo-alt' : ($recordType === 'reimbursement' ? 'cash-coin' : ($recordType === 'gatepass' ? 'door-open' : 'person-x'))) }}"></i>
                                {{ ucfirst($recordType) }}
                                <span class="badge bg-primary">{{ count($recordList) }}</span>
                            </button>
                        </li>
                        @php $firstTab = false; @endphp
                    @endforeach
                </ul>

                <div class="tab-content admin-tab-content" id="recordsTabsContent">
                    @php $firstContent = true; @endphp
                    @foreach($records as $recordType => $recordList)
                        <div class="tab-pane fade {{ $firstContent ? 'show active' : '' }}" 
                             id="{{ $recordType }}" role="tabpanel">
                            @include('admin.partials.records-table', ['records' => $recordList, 'type' => $recordType])
                        </div>
                        @php $firstContent = false; @endphp
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-inbox"></i>
                    </div>
                    <h4>No Records Found</h4>
                    <p>No records match your current filter criteria.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.admin-all-records {
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

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #7f8c8d;
}

.empty-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.empty-state h4 {
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.empty-state p {
    margin: 0;
}
</style>
@endsection
