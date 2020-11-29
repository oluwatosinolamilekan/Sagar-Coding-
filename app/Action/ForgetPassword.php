<?php

namespace App\Action;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Notifications\ForgetPassword as Notification;

class ForgetPassword
{
    public function run($request)
    {
        $user = User::where('email', $request->email)->first();
        DB::beginTransaction();
        if ($user) {
            $passwordReset = PasswordReset::updateOrCreate(
                ['email' => $user->email],
                [
                        'email' => $user->email,
                        'token' => Str::random(60)
                    ]
            );
            $user->notify(new Notification($passwordReset->token));
            DB::commit();
            return $user;
        }else{
            throw new \Exception("Email Doesnt Email");
        }
    }
}
