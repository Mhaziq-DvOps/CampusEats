<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
use Carbon\Carbon;

class LogController extends Controller
{
 

    public function loginIndex() {
    // Get all logs (or you can filter by module if needed later)
    $logs = \App\Models\Logs::all(); // or use where if filtering needed

    // Attach user name and role dynamically
    foreach ($logs as $log) {
        $user = \App\Models\Customer::find($log->Cust_Id);
        $log->user_name = $user ? $user->name : 'Unknown';
        $log->role = $user ? 'Customer' : 'Unknown'; // Adjust role if needed
    }

    return view('admin-layouts.logs_login')->with('logs', $logs);
}


  public function paymentIndex()
{
    $logs = Logs::with('user')
        ->whereIn('Log_Module', ['Payment', 'Stripe Checkout'])
        ->get();

    return view('admin-layouts.logs_pay')->with('logs', $logs);
}


}
