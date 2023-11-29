<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
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
                'type' => $request->type,
                'address' => $request->address,
                'scope' => $request->scope,
                'number' => "M-CB/".$code . "/" . $bulan_romawi . "/" . $tahun,
                'number_convert' => "M-CB". $code . $bulan_romawi . $tahun,
                'effective' => $request->effective,
                'surveillance_1' => $request->surveillance_1,
                'surveillance_2' => $request->surveillance_2,
                'date' => $request->date,
                'status' => "draft",
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

    public function getUpdate($id)
    {
        $certificate = certificate::where('id', $id)->get();
        return view('admin.certificate.certificateUpdate', [
            'certificate' => $certificate
        ]);
    }

    public function sendUpdate(Request $request, $id)
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
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }

        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'title' => $request->title,
                'type' => $request->type,
                'address' => $request->address,
                'scope' => $request->scope,
                'effective' => $request->effective,
                'surveillance_1' => $request->surveillance_1,
                'surveillance_2' => $request->surveillance_2,
                'date' => $request->date,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            certificate::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'status'   => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'error' => [
                    'message' => 'Validation Vailed!!',
                    'details' => $validate->errors()->all()
                ]
            ], 422);
        }
        
        DB::beginTransaction();
        try {
            $data = [
                'status' => $request->status,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            certificate::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function generateQrCode($number)
    {
        $qrCode = QrCode::format('svg')
            ->size(1000)
            ->errorCorrection('H')
            ->generate(url("/verifikasi/" . $number));

        return response()->json([
            'DATA' => base64_encode($qrCode)
        ]);
    }

    public function delete($id)
    {
        $data = new certificate();
        $data->where('id', $id)->delete();
    }
}
 