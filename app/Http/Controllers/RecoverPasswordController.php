<?php

namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Action\RecoverPassword;
use App\Http\Requests\ResetPasswordRequest;

class RecoverPasswordController extends Controller
{
    public function recoverPasswordView($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(20)->isPast()) {
            $passwordReset->delete();
            return redirect()->route('index')->with('error','Token Past 20 Minutes');
        }
      return view('auth.recover_password',compact('passwordReset'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
       try {
        
           $reset = (new RecoverPassword())->run($request);
           return redirect()->route('index')->with('success','Password Reset Successfully');
       } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
       }
    }

}
