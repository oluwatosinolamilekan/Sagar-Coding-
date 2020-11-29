<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Action\ForgetPassword;

class ForgetPasswordController extends Controller
{
    public function forgetPasswordView()
    {
        return view('auth.forget_password');
    }

    public function sendUserEmailReset(Request $request)
    {
        try {
            $savePassword = (new ForgetPassword())->run($request);
            return redirect()->route('index')->with('success','Email Reset Sent');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
