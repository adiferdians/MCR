<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Standard;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StandardController extends Controller
{
    public function index(){
        $standard = Standard::orderByDesc('id')->paginate(10);

        return view('admin.masters.standard.standard', [
            'data' => $standard
        ]);
    }

    function create()
    {
        return view("admin.masters.standard.standardCreate");
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

            $request->id ? Standard::where('id', $request->id)->update($data) : Standard::insert($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $standard = standard::where('id', $id)->get();
        return view('admin.masters.standard.standardUpdate', [
            'standard' => $standard
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

            Standard::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function deleteBroker($id)
    {
        $data = new Standard();
        $data->where('id', $id)->delete();
    }
}
