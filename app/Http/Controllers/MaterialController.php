<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function list(Request $request)
    {
        $materials = Material::All();
        $tabmaterial = [];
        $i = 0;
        foreach ($materials as $material){
            $tabmaterial[$i] = $materials[$i]->name;
            $i++;
        }
        $materials = json_encode($tabmaterial);
        return ($materials);
    }
    public function create(Request $request)
    {
        $materials = new Material();
        $materials->name = $request->name;
        $materials->desc = $request->desc;
        $materials->save();

        return "send";
    }
    public function delete($id){
        $users = Material::findOrFail($id);
        $users->delete();

        return "success";
    }
}
