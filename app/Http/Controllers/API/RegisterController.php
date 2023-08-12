<?php

namespace App\Http\Controllers\API;

use App\Models\User;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterUserRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterUserRequest $request)
    {
       $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
        return response()->json(
            [
                "user" => $user,
                "token" => $user->createToken('laravel_token')->plainTextToken,
                "message" => "Utilisateur créer avec succès"
            ],
            201
        );
    }
}