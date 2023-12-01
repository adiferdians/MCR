<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class VerificationController extends Controller
{
    public function verificationIndex()
    {
        return view('user.verification');
    }

    public function detilCertificate($number)
    {
        $certificate = Certificate::where('number_convert', $number)->get();
        return view('user.verification', [
            'certificate' => $certificate
        ]);
    }

    public function find(Request $request)
    {
        $name = $request->name;
        $newNumber = implode("/", $request->newNumber);
        $certificate = Certificate::where('number', $newNumber)->where('name', $name)->first();

        if ($certificate) {
            return response()->json([
                'OUT_STAT' => true,
                'MESSAGE' => 'Successfully retrieved participant data.',
                'DATA' => $certificate
            ]);
        }

        return response()->json([
            'OUT_STAT' => false,
            'MESSAGE' => 'Participant data Invalid.',
        ]);
    }
}
