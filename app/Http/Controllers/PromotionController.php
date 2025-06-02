<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;

class PromotionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table ('promotion') ->get();
 

         return view('layouts.promotion')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.promotion-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'Promo_Name' => 'required',
            'Promo_Descr' => 'required',
            'Promo_Discount' => 'required',
            'Promo_Start' => 'required',
            'Promo_End' => 'required',
            'Promo_Status' => 'required',
            'Promo_Image' => 'required|mimes:jpg,png,jpeg|max:5048'
            
        ]);
        $newImageName = time() . '-' . $request->name . '.' . 
        $request->Promo_Image->extension();
        $request->Promo_Image->move(public_path('images'), $newImageName);
        
        Promotion::create([
            'Promo_Name' => $request->input('Promo_Name'),
            'Promo_Descr' => $request->input('Promo_Descr'),
            'Promo_Discount' => $request->input('Promo_Discount'),
            'Promo_Start' => $request->input('Promo_Start'),
            'Promo_End' => $request->input('Promo_End'),
            'Promo_Status' => $request->input('Promo_Status'),
            'Promo_Image' => $newImageName,
            'Manager_id' => '1',
            'created_at' =>\Carbon\Carbon::now() ,
            
        ]);
     
        return redirect()->route('promotion.index')
                        ->with('success','Promotion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);

        // show the view and pass the shark to it
        return view('layouts.promotion-detail', ['promotion' => $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('layouts.promotion-edit', compact ('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());
        return redirect()->route('promotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Promotion $promotion)
    {
        $promotion->delete();
    
        return redirect()->route('promotion.index') ->with ('success','Promotion deleted successfully.');
    }
}
