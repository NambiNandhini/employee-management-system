<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f5f7fb; }
        .content { padding: 24px; }
        .page-title { font-size: 2rem; font-weight: 700; }
        .page-subtitle { color: #6c757d; }
        .section-title { background: #f8f9fb; border-bottom: 1px solid #e9ecef; padding: 14px 20px; font-weight: 600; }
        .card { border: 1px solid #e9ecef; border-radius: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
        .filter-box { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 16px; margin-bottom: 20px; }
        .table-card { background: #fff; border: 1px solid #e9ecef; border-radius: 12px; padding: 0; overflow: hidden; }
        .employee-mini { display:flex; align-items:center; gap:10px; }
        .avatar { width: 35px; height: 35px; border-radius: 50%; background: #e8f0ff; color: #1d4ed8; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; }
        .badge-soft-success { background: rgba(25,135,84,.12); color: #198754; }
        .badge-soft-warning { background: rgba(255,193,7,.2); color: #9a6700; }
        .action-btn { margin-right: 6px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2 bg-white border-end min-vh-100 p-3">
                <h4 class="mb-4">HRMS</h4>
                <nav class="nav flex-column gap-2">
                    <a href="{{ route('employees.index') }}" class="nav-link text-dark">Employees</a>
                    <a href="{{ route('departments') }}" class="nav-link text-dark">Departments</a>
                    <a href="{{ route('designations') }}" class="nav-link text-dark">Designations</a>
                    <a href="{{ route('attendance') }}" class="nav-link text-dark">Attendance</a>
                    <a href="{{ route('leave-management') }}" class="nav-link text-dark">Leave</a>
                    <a href="{{ route('payroll') }}" class="nav-link text-dark">Payroll</a>
                    <a href="{{ route('performance') }}" class="nav-link text-dark">Performance</a>
                    <a href="{{ route('reports') }}" class="nav-link text-dark">Reports</a>
                    <a href="{{ route('settings') }}" class="nav-link text-dark">Settings</a>
                </nav>
            </aside>
            <main class="col-md-10 p-0">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
