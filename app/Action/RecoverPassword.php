<?php

namespace App\Action;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecoverPassword
{
    public function run($request)
    {
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        DB::beginTransaction();
        $user = User::where('email', $passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        DB::commit();
        return $user;
        
    }
}
