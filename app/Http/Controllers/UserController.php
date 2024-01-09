<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $user = User::orderByDesc('id')->paginate(10);

        return view('admin.masters.user.user', [
            'data' => $user
        ]);
    }

    function create()
    {
        $role = Role::orderBy('name', 'asc')->get()->all();
        return view("admin.masters.user.userCreate", [
            'role' => $role,
        ]);
    }

    function send(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'   => 'required',
            'status'   => 'required',
            'division'   => 'required',
            'number'   => 'required',
            'email'   => 'required',
            'role'   => 'required',
            'password'   => $request->id ? "" : 'required|min:6|max:32',
            'coPassword' => $request->id ? "" : 'required|same:password',
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

        $password = bcrypt($request->password);

        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'division' => $request->division,
                'number' => $request->number,
                'id_role' => $request->role,
                'password' => $password,
                'status' => $request->status,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];

            $request->id ? User::where('id', $request->id)->update($data) : User::insert($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diinputkan', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function getUpdate($id)
    {
        $user = User::where('id', $id)->get();
        return view('admin.masters.user.userUpdate', [
            'user' => $user
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

            User::where('id', $id)->update($data);
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Status berhasil diubah', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'messages' => $e->getMessage()], 400);
        }
    }

    public function deleteBroker($id)
    {
        $data = new User();
        $data->where('id', $id)->delete();
    }
}
