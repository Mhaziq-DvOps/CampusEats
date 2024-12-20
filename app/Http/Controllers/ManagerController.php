<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{
    public function index()
    {
        $data = Manager::where('isBanned', 0)->get();
        return view('admin-layouts.man_manager',['manager'=>$data]);
    }
    
    public function partner()
    {
        return view('partnerRest');
    }

    public function partnerStore(Request $request){
        
        $manager=new Manager;
        $manager->Shop_Id=$request->input('Shop_Id');
        $manager->Name=$request->input('Name');
        $manager->Email=$request->input('Email');
        $manager->Password=Hash::make($request->input('password_confirmation'));
        // $manager->Password=$request->input(key: 'password_confirmation');
        $manager->isBanned=2;
        $manager->Phone=$request->input('Phone');
        $manager->Street_1=$request->input('Street_1');
        $manager->Postcode=$request->input('Postcode');
        $manager->City=$request->input('City');
        $manager->State=$request->input('State');
        $manager->Ban='2';
        $manager->Reason='null';
        $manager->created_at=Carbon::now();
        $manager->updated_at=Carbon::now();;
        $manager->save();

        return redirect()->route('dashboard')
                        ->with('success','Manager created successfully.');    
    }


    function manager_login(Request $req)
    {
        $manager= Manager:: where (['Email' =>$req->email])->first();
        if(!$manager || !Hash::check ($req ->password, $manager-> Password))
        {
            return "Username or password is not matched";
            /*$logs=new Logs;
            $logs->Manager_Id=Auth::id();
            $logs->Log_Module=$req->input('Log_Module');
            $logs->Log_Pay_Type=0;
            $logs->Log_Status="Fail";
            $logs->Log_Total_Price=0;
            $logs->created_at=Carbon::now();
            $logs->updated_at=Carbon::now();
            $logs->save();*/
        }
        else if( $manager-> isBanned == 1)
        {
            return "You are currently banned from using CampusEats";
        }
        else {
            $req->session() ->put ('manager', $manager);
            /*$logs=new Logs;
            $logs->Manager_Id=Auth::id();
            $logs->Log_Module=$req->input('Log_Module');
            $logs->Log_Pay_Type=0;
            $logs->Log_Status="Success";
            $logs->Log_Total_Price=0;
            $logs->created_at=Carbon::now();
            $logs->updated_at=Carbon::now();
            $logs->save();*/
            // return redirect ('layouts/index');
            //redirect betul
            //guna ni bawah dulu for now
            return view ('layouts/index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-layouts.add_cust');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'Phone' => 'required',
            'Street_1' => 'required',
            'Postcode' => 'required',
            'City' => 'required',
            'State' => 'required',
            'isBanned' => 'required',
            'Reason' => 'required'
        ]);
    
        Manager::create($request->all());
     
        return redirect()->route('manager.index')
                        ->with('success','Manager created successfully.');
    }
    public function edit(Manager $manager)
    {
        return view('admin-layouts.action_ban_man', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        //
        $manager->update($request->all());
        return redirect()->route('manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
