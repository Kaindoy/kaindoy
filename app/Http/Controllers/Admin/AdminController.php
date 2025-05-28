<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        $roleId = auth()->user()->role_id;

        return view('admin.dashboard.dashboard', compact('roleId'));
    }

    public function indexView(){
    	return view('admin.indexView.view');
    }
}
