<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    /**
     * Register user
     */

     public function register(request $request){
        $request->validate([
            'name' => 'required|string',
            'slug_id' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'

        ]);

        $user = User::create([
            'name' => $request->name,
            'slug_id'=> $request->slug_id,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // $comum = User::where(['name'] => 'user')->first();

        $response=[
            'user' => $user
        ];

        return response($response, 201);
     }

     public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check ($request->password, $user->password)){
            return response([
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $token = $user->createToken('sanctumtoken')->plainTextToken;

        $response=[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
     }

     public function logout(){
        auth()->user()->tokens()->delete();

        return[
            'message' => 'Logout successful.'
        ];
     }
}
