<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request){
    $fields = $request->validate([
        'name'=>'required|string|unique:users,name',
        'password'=>'required|string|min:6|confirmed',
    ]);

    $user = User::create([
        'name' => $fields['name'],
        'password' => Hash::make($fields['password']),
    ]);

    return response()->json(['message'=>'User created'], 201);
}

    public function login(Request $request){
        $loginUserData=$request->validate([
            'name'=>'required|string',
            'password'=>'required',
        ]);
        $user = User::where('name',$loginUserData['name'])->first();
         if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function logout(){
    $user = auth('sanctum')->user();
    $user->tokens()->delete();

    return response()->json([
      "message"=>"logged out"
    ]);
}
}
