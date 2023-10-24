<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        // $countCertificate = certificate::count();
        return view('admin.dashboard.index');
    }
}
