<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class RestaurantController extends Controller
{
    //
    public function index()
    {
        $data = Shop::where('S_Status', 0)->get();
        return view('admin-layouts.man_rest',['shop'=>$data]);
    }
    public function partner()
    {
        $data = Shop::where('S_Status', 0)->get();
        return view('admin-layouts.man_rest',['shop'=>$data]);
    }
    public function indexPend()
    {
        $data = Shop::where('S_Status', 2)->get();
        return view('admin-layouts.pending',['shop'=>$data]);
    }
    public function indexBan()
    {
        $data = Shop::where('S_Status', 1)->get();
        return view('admin-layouts.ban_rest',['shop'=>$data]);
    }

    public function edit(Shop $shop)
    {
        return view('admin-layouts.action_ban_rest', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
        $shop->update($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
