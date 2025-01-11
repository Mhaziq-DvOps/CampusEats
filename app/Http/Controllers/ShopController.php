<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Shop::all();
        return view('layouts.shopInfo', ['shop'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopInfo)
    {
        // 
        $shopInfo = Shop::find($shopInfo);
        if ($request->hasFile('S_Image')) {
            $path = 'images' . $shopInfo->S_Image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('S_Image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images', $filename);
            $shopInfo->S_Image = $filename;
        }

        if ($request->hasFile('S_Banner')) {
            $path = 'images' . $shopInfo->S_Banner;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('S_Banner');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images', $filename);
            $shopInfo->S_Banner = $filename;
        }

        $shopInfo->S_Name = $request->input('S_Name');
        $shopInfo->S_Description = $request->input('S_Description');
        $shopInfo->Dine_In = $request->input('Dine_In');
        $shopInfo->Delivery = $request->input('Delivery');
        $shopInfo->Pick_Up = $request->input('Pick_Up');
        $shopInfo->Booking = $request->input('Booking');
        $shopInfo->update();    
        return redirect()->route('shopInfo.index');
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function shop()
    {
        $shopcat= Shop_Category::where('S_Status', '1')->get();
        return view('shop_category', compact('shopcat'));
    }

    public function viewshop($S_Cat_Slug)
    {
        if(Shop_Category::where('S_Cat_Slug', $S_Cat_Slug)->exists())
        {
            $category= Shop_Category::where('S_Cat_Slug', $S_Cat_Slug)->first();
            $shop = Shop::where('S_Category', $category->S_Cat_Slug)->get();
            return view('shop', compact('category', 'shop'));
        }
        else{
            return redirect('/');
        }
    }
    public function inshop($Cat_Slug, $S_Name)
    {
        if(Shop_Category::where('S_Cat_Slug', $Cat_Slug)->exists())
        {
            if(Shop::where('S_Name',$S_Name)->exists())
            {
                $shop = Shop::where('S_Name',$S_Name)->first();
                return view('order_type', compact('shop'));
            }
            else{
                return redirect('catalogue');
            }
        }
        else{
            return redirect('shop');
        }
    }
}
