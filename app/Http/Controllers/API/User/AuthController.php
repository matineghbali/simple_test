<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string' ,
            'email' => 'required|string|unique:users,email' ,
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('MyToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string' ,
            'password' => 'required|string'
        ]);

        $user = User::where('email',$data['email'])->first();

        if (!$user || !Hash::check($data['password'],$user->password))
        {
            return response(
                [
                    'message' => 'Bad Cred'
                ],401
            );
        }

        $token = $user->createToken('MyToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }

    public function logout(Request $request): array
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
