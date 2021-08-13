<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Guid\Fields;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('mytoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return [
            'messsage' => 'Logged out'
        ];
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string'
        ]);

        //check email
        $user = User::where('email', $fields['email'])->first();
        
        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Wrong password'
            ], 401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
}
