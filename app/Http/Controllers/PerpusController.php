<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerpusController extends Controller
{
    public function index(Request $req)
    {   
        // dd(Auth::user()->role_id);
        return view('index');
    }
}
