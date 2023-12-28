<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BrokerController extends Controller
{
    public function index(){
        $broker = Broker::orderByDesc('id')->paginate(10);

        return view('admin.masters.broker.broker', [
            'data' => $broker
        ]);
    }

    function create()
    {
        return view("admin.masters.broker.brokerCreate");
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'telephone'   => 'required',
            'bank'   => 'required',
            'bankNumber'   => 'required',
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
                'phone' => $request->telephone,
                'bank' => $request->bank,
                'bank_number' => $request->bankNumber,
                'status' => $request->status,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? Broker::where('id', $request->id)->update($data) : Broker::insert($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $broker = broker::where('id', $id)->get();
        return view('admin.masters.broker.brokerUpdate', [
            'broker' => $broker
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

            Broker::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function deleteBroker($id)
    {
        $data = new Broker();
        $data->where('id', $id)->delete();
    }
}
