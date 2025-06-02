<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
use Carbon\Carbon;

class LogController extends Controller
{
    //
    public function loginIndex(){
        $data = Logs::where('Log_Module', 'Login')->get();
        return view('admin-layouts.logs_login')->with('logs',$data);
    }
    public function paymentIndex(){
        $data = Logs::where('Log_Module', 'Payment')->get();
        return view('admin-layouts.logs_pay')->with('logs',$data);
    }
}
