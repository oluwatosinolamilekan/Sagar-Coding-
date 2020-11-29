<?php

namespace App\Action;

use App\Models\Developer;
use Illuminate\Support\Facades\DB;

class CreateDeveloper
{
    public function run($request)
    {
      $image = $request->file('image');
      dd($image)
      $fileName = time().'.'.$image->getClientOriginalExtension();
      $locationPath = 'devimages';
      $store_image = $image->move(($locationPath), $fileName);
       DB::beginTransaction();
       $developer = new Developer;
       $developer->first_name = $request->first_name;
       $developer->last_name = $request->last_name;
       $developer->phone_number = $request->phone_number;
       $developer->address = $request->address;
       $developer->email = $request->email;
        $developer->avater = $fileName;
       $developer->save();
       DB::commit();

       return $developer;
    }
}
