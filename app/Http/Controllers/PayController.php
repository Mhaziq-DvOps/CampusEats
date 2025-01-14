<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PayController extends Controller
{
    public function index()
    {
        //
        $data = Payment::all();
        return view('admin-layouts.payment')->with('pay',$data);
    }

    public function edit(Payment $payment)
    {
        //
        return view('admin-layouts.edit_payment', compact('payment'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
        $payment->update($request->all());
        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $pay)
    {
        //
    }
}
