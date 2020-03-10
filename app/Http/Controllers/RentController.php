<?php

namespace App\Http\Controllers;

use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function rent ($id, Request $request){
        $rent = new Rent();
        $rent-> Material_id = $id;
        $rent-> save();

        return "success";
    }
}
