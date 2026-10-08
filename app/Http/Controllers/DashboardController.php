<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function attendance()
    {
        return view('attendance');
    }

    public function departments()
    {
        return view('departments');
    }

    public function designations()
    {
        return view('designations');
    }

    public function leaveManagement()
    {
        return view('leave-management');
    }

    public function payroll()
    {
        return view('payroll');
    }

    public function performance()
    {
        return view('performance');
    }

    public function reports()
    {
        return view('reports');
    }

    public function settings()
    {
        return view('settings');
    }
}
