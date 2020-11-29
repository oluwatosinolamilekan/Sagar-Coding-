<?php

namespace App\Http\Controllers;
use Exception;
use App\Action\CreateUser;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;

class RegistrationController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function postRegister(StoreRegisterRequest $request)
    {
        try {
            $storeUser = (new CreateUser())->run($request);
            return redirect()->route('developer.index')->with('success','Welcome');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
