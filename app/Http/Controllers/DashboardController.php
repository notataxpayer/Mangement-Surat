<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }
    public function userDashboard()
    {
        return view('user.dashboard');
    }
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
