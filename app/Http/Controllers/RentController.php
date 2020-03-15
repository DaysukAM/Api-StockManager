<?php

namespace App\Http\Controllers;

use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function rent (Request $request){
        $rent = new Rent();
        $rent-> Material_id = $request->Material_id;
        $rent-> User_id = $request->User_id;
        $rent-> save();

        return response()->json(['status' => 'succes', 'message' => 'Matériel emprunté']);
    }
}
