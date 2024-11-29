<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin/dashboard/index');
        // return view('dashboard')->with('jsfile', 'dashboard.js');
    }
    public function booking()
    {
        return view('booking')->with('jsfile', 'booking.js');
    }
    public function cars()
    {
        return view('cars');
    }
    public function report()
    {
        return view('report');
    }
}
