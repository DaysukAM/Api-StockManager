<?php

namespace App\Http\Controllers;


use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return "utilisateur créé";
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json(['status' => 'error', 'message' => 'Utilisateur inexistant !']);
        }

        if(Hash::check($request->password, $user -> password)){
            return response()->json(['status' => 'succes', 'message' => 'Utilisateur connecté !', 'user' => $user])
            ;
        }

        return response()->json(['status' => 'error', 'message' => 'Mot de passe incorrect',]
        );
    }
}
