@extends('layouts.app')

@section('title', 'Add Employee | Employee Management')

@section('content')
<main class="content">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="page-title">Add Employee</h1>
            <p class="page-subtitle">Fill in the details to add a new employee.</p>
        </div>
        <div>
            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
            <button type="submit" form="employeeForm" class="btn btn-primary">Save Employee</button>
        </div>
    </div>

    <form id="employeeForm" method="POST" action="{{ route('employees.store') }}">
        @csrf

        <div class="card mb-4">
            <div class="section-title">1. Personal Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Employee ID *</label>
                        <input class="form-control" name="employee_id" value="{{ old('employee_id', 'EMP' . rand(100, 999)) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">First Name *</label>
                        <input class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Last Name *</label>
                        <input class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" name="profile_photo">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date of Birth *</label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Gender *</label>
                        <select class="form-select" name="gender" required>
                            <option value="">Select</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select" name="blood_group">
                            <option value="">Select</option>
                            <option value="O+">O+</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select" name="marital_status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Personal Email *</label>
                        <input type="email" class="form-control" name="personal_email" value="{{ old('personal_email') }}" placeholder="name@example.com" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mobile Number *</label>
                        <input class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="10 digit mobile number" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="section-title">2. Employment Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Joining Date *</label>
                        <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Department *</label>
                        <select class="form-select" name="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Designation *</label>
                        <select class="form-select" name="designation_id" required>
                            <option value="">Select Designation</option>
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Employee Type</label>
                        <select class="form-select" name="employee_type">
                            <option value="Permanent">Permanent</option>
                            <option value="Contract">Contract</option>
                            <option value="Intern">Intern</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Reporting Manager</label>
                        <select class="form-select" name="manager_id">
                            <option value="">Select Manager</option>
                            @foreach($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Work Location</label>
                        <select class="form-select" name="work_location">
                            <option value="Gandhinagar">Gandhinagar</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Shift</label>
                        <select class="form-select" name="shift">
                            <option value="General Shift">General Shift</option>
                            <option value="Morning Shift">Morning Shift</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status *</label>
                        <select class="form-select" name="status" required>
                            <option value="Active">Active</option>
                            <option value="On Leave">On Leave</option>
                            <option value="Resigned">Resigned</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="section-title">3. Contact & Emergency Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Current Address</label>
                        <textarea class="form-control" rows="3" name="current_address"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Permanent Address</label>
                        <textarea class="form-control" rows="3" name="permanent_address"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Emergency Contact Name</label>
                        <input class="form-control" name="emergency_contact_name">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Relationship</label>
                        <input class="form-control" name="relationship">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Emergency Phone</label>
                        <input class="form-control" name="emergency_phone">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection
