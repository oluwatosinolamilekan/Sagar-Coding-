<?php

namespace App\Action;

use App\Models\Developer;
use Illuminate\Support\Facades\DB;

class EditDeveloper
{
    public function run($request,$id)
    {
      $image = $request->file('image');
      $fileName = null;
      if($image){
        $fileName = time().'.'.$image->getClientOriginalExtension();
        $locationPath = 'devimages';
        $store_image = $image->move(($locationPath), $fileName);
      }
      DB::beginTransaction();
       $developer = Developer::findOrFail($id);
       $developer->first_name = $request->first_name;
       $developer->last_name = $request->last_name;
       $developer->phone_number = $request->phone_number;
       $developer->address = $request->address;
       $developer->email = $request->email;
       $developer->avater = $fileName ?? $developer->avater;
       $developer->save();
       DB::commit();

       return $developer;
    }
}
