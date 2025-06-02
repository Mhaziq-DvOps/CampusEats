<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //     public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    function admin_login(Request $req)
    {
        $admin= Admin:: where (['Email' =>$req->email])->first();
        $user = DB::table('users')->count();
        $manager = DB::table('manager')->count();
        $total = $user + $manager;
        $shop = Manager::where('isBanned', 2)->get();
        $shopCount = $shop->count();
        // $bancust = Customer::where(column: 'isBanned', 1)->get();
        $banman = Manager::where('isBanned', 1)->get();
        // $custCount = $bancust->count();
        $manCount = $banman->count();
        // $banuser = $custCount + $manCount;
        
        if(!$admin || !Hash::check ($req ->password, $admin-> Password))
        {
            // return "Username or password is not matched";
            return redirect()->back()->with('error', 'Username or password is not matched');
        }

        else {
            $req->session() ->put ('admin', $admin);
            // return redirect ('layouts/index');
            //redirect betul
            //guna ni bawah dulu for now
            // return view ('admin-layouts.base');
                    return view('admin-layouts.base')->with('total',$total)->with('shop',$shopCount)
        ->with('pending',$shop);
        }

    }
        public function indexBan()
    {
        $data = Shop::where('S_Status', 1)->get();
        return view('admin-layouts.ban_rest',['shop'=>$data]);
    }
        public function UserBan()
    {
        //
        $customer = Customer::where('isBanned', 1)->get();
        $data = Manager::where('isBanned', 1)->get();
     
        return view('admin-layouts.ban_user')->with('customer',$customer)->with('manager',$data);
    }
}
