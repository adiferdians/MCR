<?php

namespace App\Http\Controllers;
use App\Models\certification_body;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CertificationBodyController extends Controller
{
    public function index(){
        $certification_body = certification_body::orderByDesc('id')->paginate(10);

        return view('admin.masters.certBody.certBody', [
            'data' => $certification_body
        ]);
    }

    function create()
    {
        return view("admin.masters.certBody.certBodyCreate");
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'status'   => 'required',
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
                'status' => $request->status,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? certification_body::where('id', $request->id)->update($data) : certification_body::insert($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $certification_body = certification_body::where('id', $id)->get();
        return view('admin.masters.certBody.certBodyUpdate', [
            'data' => $certification_body
        ]);
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

            certification_body::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function deleteBroker($id)
    {
        $data = new certification_body();
        $data->where('id', $id)->delete();
    }
}
