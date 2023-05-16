<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index($id = null) {
        $admins = Admin::latest()->get();
        return view('backend.admins.table', compact('admins'));
    }
}
