<?php

namespace App\Http\Controllers;
use App\Models\client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $client = client::orderByDesc('id')->paginate(10);
    
        return view('admin.client.client', [
            'client' => $client,
        ]);
    }

    function create()
    {
        return view("admin.client.clientCreate");
    }
}
