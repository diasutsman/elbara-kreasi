<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
}
