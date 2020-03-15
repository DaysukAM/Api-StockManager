<?php

namespace App\Http\Controllers;

use App\Material;
use App\Rent;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function list(Request $request)
    {
        $tabrent = [];
        $materials = Material::All();
        $tabmaterial = [];
        $i = 0;
        foreach ($materials as $material){
            $materialid = $material->id;
            $rent = Rent::where('Material_id', $materialid)->get();
            $tabrent[$i] = $rent;

            if ($rent == "[]"){
                $tabmaterial[$i] = $materials[$i];
            }
                $i++;
        }
        $materials = json_encode($tabmaterial);
        return ($materials);
    }
    public function listrent(Request $request)
    {
        //fonction de test !!!!
        $rent = Rent::all();
        $tabrent = [];
        $materials = Material::All();
        $tabmaterial = [];
        $i = 0;
        foreach ($materials as $material){
            $materialid = $material->id;
            $rent = Rent::where('Material_id', $materialid)->get();
            $tabrent[$i] = $rent;
            if ($rent == "[]"){
                $tabmaterial[$i] = $materials[$i];
                $i++;
            }
        }
        $rents = json_encode($tabrent);
        $materials = json_encode($tabmaterial);
        return ($rents);
    }
    public function create(Request $request)
    {
        $materials = new Material();
        $materials->name = $request->name;
        $materials->desc = $request->desc;
        $materials->save();

        return response()->json(['status' => 'succes', 'message' => 'Matériel Créé', 'material' => $materials]);
    }
    public function delete($id){
        $users = Material::findOrFail($id);
        $users->delete();

        return "success";
    }
}
