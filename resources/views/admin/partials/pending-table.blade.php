@if(count($records) > 0)
    <div class="table-responsive">
        <table class="table admin-table">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>
                        @switch($type)
                            @case('attendance')
                                Date & Status
                                @break
                            @case('itinerary')
                                Date & Destination
                                @break
                            @case('reimbursement')
                                Date & Amount
                                @break
                            @case('gatepass')
                                Date & Time
                                @break
                            @case('excuse')
                                Date & Type
                                @break
                        @endswitch
                    </th>
                    <th>Details</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                <tr>
                    <td>
                        <div class="employee-info">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ $record->employee_name }}</span>
                        </div>
                    </td>
                    <td>
                        @switch($type)
                            @case('attendance')
                                <div class="record-details">
                                    <strong>{{ $record->attendance_date->format('M d, Y') }}</strong>
                                    <span class="status-badge status-{{ strtolower($record->status) }}">{{ $record->status }}</span>
                                </div>
                                @break
                            @case('itinerary')
                                <div class="record-details">
                                    <strong>{{ $record->itinerary_date->format('M d, Y') }}</strong>
                                    <small>{{ $record->destination }}</small>
                                </div>
                                @break
                            @case('reimbursement')
                                <div class="record-details">
                                    <strong>{{ $record->reimbursement_date->format('M d, Y') }}</strong>
                                    <span class="amount">${{ number_format($record->amount, 2) }}</span>
                                </div>
                                @break
                            @case('gatepass')
                                <div class="record-details">
                                    <strong>{{ $record->date->format('M d, Y') }}</strong>
                                    <small>{{ $record->time_in }} - {{ $record->time_out }}</small>
                                </div>
                                @break
                            @case('excuse')
                                <div class="record-details">
                                    <strong>{{ $record->excuse_date->format('M d, Y') }}</strong>
                                    <small>{{ $record->kind_of_excuse }}</small>
                                </div>
                                @break
                        @endswitch
                    </td>
                    <td>
                        @switch($type)
                            @case('itinerary')
                                <div class="record-description">{{ Str::limit($record->purpose, 50) }}</div>
                                @break
                            @case('reimbursement')
                                <div class="record-description">
                                    <strong>{{ $record->expense_type }}</strong><br>
                                    {{ Str::limit($record->description, 40) }}
                                </div>
                                @break
                            @case('gatepass')
                                <div class="record-description">
                                    <strong>To: {{ $record->destination }}</strong><br>
                                    {{ Str::limit($record->reason, 40) }}
                                </div>
                                @break
                            @case('excuse')
                                <div class="record-description">{{ Str::limit($record->reason, 50) }}</div>
                                @break
                            @default
                                -
                        @endswitch
                    </td>
                    <td>
                        <div class="submitted-info">
                            <i class="bi bi-clock"></i>
                            <span>{{ $record->created_at->diffForHumans() }}</span>
                        </div>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-sm btn-success approve-btn" 
                                    data-type="{{ $type }}" 
                                    data-id="{{ $record->id }}"
                                    title="Approve">
                                <i class="bi bi-check2"></i>
                            </button>
                            <button class="btn btn-sm btn-danger decline-btn" 
                                    data-type="{{ $type }}" 
                                    data-id="{{ $record->id }}"
                                    title="Decline">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="bi bi-check-circle-fill text-success"></i>
        </div>
        <h4>All Clear!</h4>
        <p>No pending {{ $type }} requests at the moment.</p>
    </div>
@endif

<style>
.admin-table {
    margin: 0;
}

.admin-table th {
    background: #f8f9fa;
    border: none;
    color: #2c3e50;
    font-weight: 600;
    padding: 1rem;
    border-bottom: 2px solid #ecf0f1;
}

.admin-table td {
    padding: 1rem;
    border: none;
    border-bottom: 1px solid #ecf0f1;
    vertical-align: middle;
}

.employee-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: #2c3e50;
}

.employee-info i {
    font-size: 1.2rem;
    color: #3498db;
}

.record-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.record-details strong {
    color: #2c3e50;
    font-size: 0.95rem;
}

.record-details small {
    color: #7f8c8d;
    font-size: 0.8rem;
}

.status-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-present {
    background: #d4edda;
    color: #155724;
}

.status-absent {
    background: #f8d7da;
    color: #721c24;
}

.status-late {
    background: #fff3cd;
    color: #856404;
}

.amount {
    color: #27ae60;
    font-weight: 600;
    font-size: 1.1rem;
}

.record-description {
    font-size: 0.9rem;
    color: #7f8c8d;
    line-height: 1.4;
}

.submitted-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #7f8c8d;
    font-size: 0.85rem;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.action-buttons .btn {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.action-buttons .btn:hover {
    transform: scale(1.1);
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
