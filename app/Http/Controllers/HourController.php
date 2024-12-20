<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;

class HourController extends Controller{

    public function index()
    {
        //
        $hour = Hour::all();
        return view('admin-layouts.biz_hours',['biz_hour'=>$hour]);
    }
    public function changeDayStatus(Request $request){

        $hour= Hour::find($request->day_id);
        $hour->day_off = $request->day_off;
        $hour->save();

        return response()->json(['success'=>'User status change successfully.']);
    }
    public function store(Request $request)
    {
        //
        Hour::create($request->all());

        return redirect()->route('biz_hour.index')
                        ->with('success','Hour Created');
    }
    public function edit(Hour $biz_hour)
    {
        return view('admin-layouts.editHours',compact('biz_hour'));
    }

    public function update(Request $request, Hour $biz_hour)
    {
        $biz_hour->update($request->all());
        return redirect()->route('biz_hour.index');
    }

    public function destroy(Hour $hour)
    {
        //
        $hour->delete();

        return redirect()->back()
                        ->with('success','Business Hours deleted successfully');
    }
}
