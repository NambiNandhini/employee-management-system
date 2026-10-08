<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with(['department', 'designation'])->latest()->get();

        return view('employees.index', compact('employees'));
    }

    public function create(): View
    {
        $departments = Department::orderBy('name')->get();
        $designations = Designation::orderBy('name')->get();
        $managers = Employee::orderBy('first_name')->get();

        return view('employees.create', compact('departments', 'designations', 'managers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => ['required', 'string', 'unique:employees,employee_id'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'personal_email' => ['required', 'email', 'unique:employees,email'],
            'mobile_number' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:Female,Male,Other'],
            'joining_date' => ['required', 'date'],
            'department_id' => ['required', 'exists:departments,id'],
            'designation_id' => ['required', 'exists:designations,id'],
            'status' => ['required', 'in:Active,On Leave,Resigned'],
        ]);

        $employee = Employee::create([
            'employee_id' => $validated['employee_id'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['personal_email'],
            'phone' => $validated['mobile_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'blood_group' => $request->input('blood_group'),
            'marital_status' => $request->input('marital_status'),
            'joining_date' => $validated['joining_date'],
            'department_id' => $validated['department_id'],
            'designation_id' => $validated['designation_id'],
            'manager_id' => $request->input('manager_id'),
            'employee_type' => $request->input('employee_type', 'Permanent'),
            'work_location' => $request->input('work_location', 'Gandhinagar'),
            'shift' => $request->input('shift', 'General Shift'),
            'status' => $validated['status'],
            'current_address' => $request->input('current_address'),
            'permanent_address' => $request->input('permanent_address'),
            'emergency_contact_name' => $request->input('emergency_contact_name'),
            'emergency_contact_relation' => $request->input('relationship'),
            'emergency_contact_phone' => $request->input('emergency_phone'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        $departments = Department::orderBy('name')->get();
        $designations = Designation::orderBy('name')->get();
        $managers = Employee::where('id', '!=', $employee->id)->orderBy('first_name')->get();

        return view('employees.edit', compact('employee', 'departments', 'designations', 'managers'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'personal_email' => ['required', 'email', 'unique:employees,email,' . $employee->id],
            'mobile_number' => ['required', 'string', 'max:20'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'in:Female,Male,Other'],
            'joining_date' => ['required', 'date'],
            'department_id' => ['required', 'exists:departments,id'],
            'designation_id' => ['required', 'exists:designations,id'],
            'status' => ['required', 'in:Active,On Leave,Resigned'],
        ]);

        $employee->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['personal_email'],
            'phone' => $validated['mobile_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'blood_group' => $request->input('blood_group'),
            'marital_status' => $request->input('marital_status'),
            'joining_date' => $validated['joining_date'],
            'department_id' => $validated['department_id'],
            'designation_id' => $validated['designation_id'],
            'manager_id' => $request->input('manager_id'),
            'employee_type' => $request->input('employee_type', 'Permanent'),
            'work_location' => $request->input('work_location', 'Gandhinagar'),
            'shift' => $request->input('shift', 'General Shift'),
            'status' => $validated['status'],
            'current_address' => $request->input('current_address'),
            'permanent_address' => $request->input('permanent_address'),
            'emergency_contact_name' => $request->input('emergency_contact_name'),
            'emergency_contact_relation' => $request->input('relationship'),
            'emergency_contact_phone' => $request->input('emergency_phone'),
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
