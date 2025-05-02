<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index()
    {
        $roleId = auth()->user()->role_id;

        return view('user.dashboard.dashboard', compact('roleId'));
    }
}
