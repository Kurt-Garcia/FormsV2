@if(count($records) > 0)
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    @if($type === 'attendance')
                        <th>Date</th>
                        <th>Status</th>
                    @elseif($type === 'itinerary')
                        <th>Travel Date</th>
                        <th>Destination</th>
                        <th>Purpose</th>
                    @elseif($type === 'reimbursement')
                        <th>Expense Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                    @elseif($type === 'gatepass')
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Destination</th>
                    @elseif($type === 'excuse')
                        <th>Date</th>
                        <th>Type</th>
                        <th>Reason</th>
                    @endif
                    <th>Approval Status</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->employee_name }}</td>
                        @if($type === 'attendance')
                            <td>{{ $record->attendance_date->format('M d, Y') }}</td>
                            <td>
                                <span class="status-badge status-{{ strtolower($record->status) }}">
                                    {{ $record->status }}
                                </span>
                            </td>
                        @elseif($type === 'itinerary')
                            <td>{{ $record->itinerary_date->format('M d, Y') }}</td>
                            <td>{{ $record->destination }}</td>
                            <td>{{ Str::limit($record->purpose, 30) }}</td>
                        @elseif($type === 'reimbursement')
                            <td>{{ $record->reimbursement_date->format('M d, Y') }}</td>
                            <td>{{ $record->expense_type }}</td>
                            <td>${{ number_format($record->amount, 2) }}</td>
                        @elseif($type === 'gatepass')
                            <td>{{ $record->date->format('M d, Y') }}</td>
                            <td>{{ $record->time_in }}</td>
                            <td>{{ $record->time_out }}</td>
                            <td>{{ $record->destination }}</td>
                        @elseif($type === 'excuse')
                            <td>{{ $record->excuse_date->format('M d, Y') }}</td>
                            <td>{{ $record->kind_of_excuse }}</td>
                            <td>{{ Str::limit($record->reason, 30) }}</td>
                        @endif
                        <td>
                            <span class="approval-badge approval-{{ $record->status_approval }}">
                                {{ ucfirst($record->status_approval) }}
                            </span>
                        </td>
                        <td>{{ $record->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            @if($record->status_approval === 'pending')
                                <button class="btn btn-sm btn-success approve-btn me-1" 
                                        data-type="{{ $type }}" 
                                        data-id="{{ $record->id }}">
                                    <i class="bi bi-check"></i>
                                </button>
                                <button class="btn btn-sm btn-danger decline-btn" 
                                        data-type="{{ $type }}" 
                                        data-id="{{ $record->id }}">
                                    <i class="bi bi-x"></i>
                                </button>
                            @else
                                <button class="btn btn-sm btn-info view-details-btn" 
                                        data-record='@json($record)'>
                                    <i class="bi bi-eye"></i>
                                </button>
                                @if($record->admin_remarks)
                                    <small class="text-muted d-block mt-1">{{ Str::limit($record->admin_remarks, 30) }}</small>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="bi bi-inbox"></i>
        </div>
        <h5>No {{ ucfirst($type) }} Records</h5>
        <p>No records found for this category.</p>
    </div>
@endif

<style>
.admin-table {
    margin: 0;
}

.admin-table th {
    background: #f8f9fa;
    font-weight: 600;
    color: #2c3e50;
    border: none;
    padding: 1rem 0.75rem;
}

.admin-table td {
    padding: 1rem 0.75rem;
    border-top: 1px solid #ecf0f1;
    vertical-align: middle;
}

.status-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-present { background: #d4edda; color: #155724; }
.status-absent { background: #f8d7da; color: #721c24; }
.status-late { background: #fff3cd; color: #856404; }

.approval-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.approval-pending { background: #fff3cd; color: #856404; }
.approval-approved { background: #d4edda; color: #155724; }
.approval-declined { background: #f8d7da; color: #721c24; }

.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #7f8c8d;
}

.empty-state .empty-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.empty-state h5 {
    color: #2c3e50;
    margin-bottom: 0.5rem;
}
</style>
