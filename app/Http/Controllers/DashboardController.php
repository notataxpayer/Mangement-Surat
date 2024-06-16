<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     return view('dashboardview.dashboardUser');
    // }
    public function userDashboard()
    {
        return view('dashboardview.dashboardUser');
    }
    public function adminDashboard()
    {
        return view('dashboardview.dashboardAdmin');
    }
}
