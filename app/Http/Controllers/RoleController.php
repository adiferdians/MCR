<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderByDesc('id')->paginate(10);

        return view('admin.masters.role.role', [
            'data' => $role
        ]);
    }

    function create()
    {
        return view("admin.masters.role.roleCreate");
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'status'   => 'required',
            'role'   => 'required',
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
                'authorization' => $request->role,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? Role::where('id', $request->id)->update($data) : Role::insert($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $role = Role::where('id', $id)->get();
        return view('admin.masters.role.roleUpdate', [
            'role' => $role
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

            Role::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function deleteBroker($id)
    {
        $data = new Role();
        $data->where('id', $id)->delete();
    }
}
