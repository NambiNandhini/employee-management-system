@extends('layouts.app')

@section('title', 'Employees | Employee Management')

@section('content')
<main class="content">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="page-title">Employees</h1>
            <p class="page-subtitle">Manage and view all employees in your organisation.</p>
        </div>
        <a class="btn btn-primary" href="{{ route('employees.create') }}">
            <i class="bi bi-plus-lg me-1"></i>Add Employee
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="filter-box">
        <div class="row g-2">
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input class="form-control" placeholder="Search by name, ID, email...">
                </div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-responsive">
            <table class="table table-hover" id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->employee_id }}</td>
                            <td>
                                <div class="employee-mini">
                                    <div class="avatar">{{ strtoupper(substr($employee->first_name,0,1) . substr($employee->last_name,0,1)) }}</div>
                                    <strong>{{ $employee->first_name }} {{ $employee->last_name }}</strong>
                                </div>
                            </td>
                            <td>{{ $employee->department?->name ?? '-' }}</td>
                            <td>{{ $employee->designation?->name ?? '-' }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('d-m-Y') }}</td>
                            <td>
                                @if($employee->status === 'Active')
                                    <span class="badge badge-soft-success">{{ $employee->status }}</span>
                                @elseif($employee->status === 'On Leave')
                                    <span class="badge badge-soft-warning">{{ $employee->status }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ $employee->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employees.show', $employee) }}" class="btn btn-sm btn-outline-primary action-btn">View</a>
                                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-outline-secondary action-btn">Edit</a>
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger action-btn" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
