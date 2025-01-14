<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function admin_login(Request $req)
    {
        $admin= Admin:: where (['Email' =>$req->email])->first();
        if(!$admin || !Hash::check ($req ->password, $admin-> Password))
        {
            return "Username or password is not matched";
        }
        // else if( $admin-> isBanned == 1)
        // {
        //     return "You are currently banned from using AppXilon";
        // }
        else {
            $req->session() ->put ('admin', $admin);
            // return redirect ('layouts/index');
            //redirect betul
            //guna ni bawah dulu for now
            return view ('admin-layouts.base');
        }
    }
}
