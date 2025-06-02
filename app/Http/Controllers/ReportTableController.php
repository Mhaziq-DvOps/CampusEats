<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class ReportTableController extends Controller
{
    //index
    public function index()
    {
        $data= Order::all();
        return view('reports.report', ['Report'=>$data]);    }

        //customer data
    public function customerData(){
        $data= Customer::all();
        return view('reports.customerreport', ['Customer'=>$data]);
    }
}
