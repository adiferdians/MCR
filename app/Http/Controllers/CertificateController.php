<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(){
        $certificate = certificate::orderByDesc('id')->paginate(10);

        return view('admin.certificate.certificate', [
            'data' => $certificate
        ]);
    }

    function create()
    {
        return view("admin.certificate.certificateCreate");
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'title'   => 'required',
            'type'   => 'required',
            'address'   => 'required',
            'scope'   => 'required',
            'effective'   => 'required',
            'surveillance_1'   => 'required',
            'surveillance_2'   => 'required',
            'date'   => 'required',
            'status'   => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'messages' => $validate->messages()
            ], 422);
        }

        $countCertivicate = certificate::count();

        $increment = $countCertivicate;
        $alphabet = range('A', 'Z');
        $base = count($alphabet);
        $number = '';
        while ($increment > 0) {
            $remainder = $increment % $base;
            $number = $alphabet[$remainder] . $number;
            $increment = ($increment - $remainder) / $base;
        }
        $code = str_pad($number, 4, 'A', STR_PAD_LEFT);

        $bulan = date('m', strtotime($request->date));
        $tahun = date('Y', strtotime($request->date));
        $bulan = str_replace('0', '', $bulan);

        $bulan_romawi = '';
        if ($bulan >= 1 && $bulan <= 12) {
            $angka_romawi = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII'
            ];
            $bulan_romawi = $angka_romawi[$bulan];
        }

        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'sub_title' => $request->subTitle,
                'address' => $request->address,
                'scope' => $request->scope,
                'number' => "M-CB/".$code . "/" . $bulan_romawi . "/" . $tahun,
                'number_convert' => "M-CB". $code . $bulan_romawi . $tahun,
                'expired' => $request->expired,
                'date' => $request->date,
                'status' => "draft",
                'iso' => 9,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? certificate::where('id', $request->id)->update($data) : certificate::insert($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }
}
 