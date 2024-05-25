<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Crud;

class CrudController extends Controller
{
    //
    public function save(Request $request){
        // dd($request);
        $modalDataSave = new Crud();
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('images', 'public');
            $request['imagepath'] = $imagePath;
        }
        $get_id = $modalDataSave->insertRecord($request);
        
        // Insert the record
        // $crud = Crud::insertRecord($request);


        return back()->with('success', 'Details Inserted');
        // return response()->json(['success' => true, 'message' => 'Item Updated']);
        
    }
    public function remove(Request $request){
        $modalDataSave = new Crud();
        $get_id = $modalDataSave->remove($request['id']);
        if($get_id!=''){
            
            return response()->json(['success' => true, 'message' => 'Deleted successfully.']);
        }else{
            return response()->json(['fail' => true, 'message' => 'Error']);

        }
      
    }
    public function update(Request $request){
        $modalDataSave = new Crud();
        $get_id = $modalDataSave->updates($request);
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('images', 'public');
            $request['imagepath'] = $imagePath;
        }
        if($get_id!=''){
            return back()->with('success', 'Updated successfully.');
            // return response()->json(['success' => true, 'message' => 'Updated successfully.']);
        }else{
            return back()->with(['fail' => true, 'message' => 'Error']);

        }
      
    }
    public function show(Request $request){
        $modalDataSave = new Crud();
        $getDetails = $modalDataSave->show($request['id']);
        return view('ajax',['show_details' => $getDetails]);
    }
    

}
