<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Client;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $certificateActive = Certificate::where('status', '=', 'Active')->count();
        $certificateWithdraw = Certificate::where('status', '=', 'Withdraw')->count();
        $certificateSuspended = Certificate::where('status', '=', 'Suspended')->count();

        return view('admin.dashboard.index', [
            'countCertificateActive' => $certificateActive,
            'countCertificateWithdraw' => $certificateWithdraw,
            'countCertificateSuspended' => $certificateSuspended,
        ]);
    }
}
