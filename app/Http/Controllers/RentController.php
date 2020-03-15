<?php

namespace App\Http\Controllers;

use App\Material;
use App\Rent;

use Illuminate\Http\Request;

class RentController extends Controller
{
    public function rent (Request $request){
        $rent = new Rent();
        $rent-> Material_id = $request->Material_id;
        $rent-> User_id = $request->User_id;


        $renttest = Rent::where('Material_id',$request->Material_id)->first();
        if($renttest){
            return response()->json(['status' => 'error', 'message' => 'Matériel déja emprunté !']);
        }

        $Material = Material::where('id',$request->Material_id)->first();
        if(!$Material){
            return response()->json(['status' => 'error', 'message' => 'Matériel inexistant !']);
        }

        $rent-> save();
        return response()->json(['status' => 'succes', 'message' => 'Matériel emprunté']);
    }
}
