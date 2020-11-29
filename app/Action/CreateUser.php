<?php

namespace App\Action;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateUser
{
    public function run($request)
    {
        DB::beginTransaction();
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        Auth::login($user);
        DB::commit();
        return $user;
    }
}
