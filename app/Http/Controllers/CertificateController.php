<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(){
        $certificate = certificate::orderByDesc('id')->paginate(10);

        $data = [
            'certificate' => $certificate,
        ];

        return view('admin.certificate.certificate', [
            'data' => $data
        ]);
    }
}
 