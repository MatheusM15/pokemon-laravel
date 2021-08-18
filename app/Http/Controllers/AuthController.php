<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;
    }
    
    public function login(Request $request){
        $user = $this->user;
        $cre =  $request->all(['email','password']);
        $token =  Auth('api')->attempt($cre);
        if($token != null){
            $user =  User::where('email',$request->email)->first();
            
        }
        return response()->json(['token' => $token,'user_id' => $user->id]);
    }
    public function getPoke($id){
        $user = $this->user->find($id);
        return response()->json($user->pokemon()->count());
    }
}
