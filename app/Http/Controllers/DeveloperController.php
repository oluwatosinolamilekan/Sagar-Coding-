<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Developer;
use Illuminate\Http\Request;
use App\Action\EditDeveloper;
use App\Action\CreateDeveloper;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::latest()->get();
        return view('developer.index',compact('developers'));
    }

    public function create()
    {
        return view('developer.create');
    }

    public function edit($id)
    {
        $developer = Developer::findorFail($id);
        return view('developer.edit',compact('developer'));
    }
    public function store(StoreDeveloperRequest $request)
    {
        try {
            $storeDeveloper = (new CreateDeveloper())->run($request);
            return redirect()->route('developer.index')->with('success','Created Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function update(UpdateDeveloperRequest $request,$id)
    {
        try {
            $storeDeveloper = (new EditDeveloper())->run($request,$id);
            return redirect()->route('developer.index')->with('success','Created Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
    public function singleDelete($id)
    {
        $deleteDev = Developer::find($id);
        $deleteDev->delete();
        return redirect()->route('developer.index')->with('success','delete Successfully');
    }

    public function multipleDelete(Request $request)
    {
        $selected = $request->ids;
        Developer::whereIn('id',explode(",",$selected))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
