<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'products' => Product::all(),
            'portfolios' => Portfolio::all(),
        ]);
    }

    public function setEmailReceiver(Request $request)
    {
        $validatedEmail = $request->validate([
            'email' => 'required|email:dns',
        ])['email'];

        Redis::set('email_receiver', $validatedEmail);        
    }

    public function setWhatsappNumber(Request $request)
    {
        $validatedNumber = $request->validate([
            'number' => 'required|phone:ID',
        ])['number'];

        Redis::set('whatsapp_numbers', $validatedNumber);        
    }

    public function setPhoneNumber(Request $request)
    {
        $validatedNumber = $request->validate([
            'number' => 'required|phone:ID',
        ])['number'];

        Redis::set('phone_numbers', $validatedNumber); 
    }
}
