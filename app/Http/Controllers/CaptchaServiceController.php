<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Captcha;

class CaptchaServiceController extends Controller
{
    //
    public function index()
    {
        $data = Captcha::all();
        return view('admin-layouts.captcha',['capt'=>$data]);
    }
    public function edit($Capt_Id)
    {
        $capt = Captcha::find($Capt_Id);
        return view('admin-layouts.editCaptcha', compact('capt'));
    }
    public function update($Capt_Id)
    {
        $capt = Captcha::find($Capt_Id);
        return view('admin-layouts.editCaptcha', compact('capt'));
    }
    public function capthcaFormValidate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'captcha' => 'required|captcha'
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
