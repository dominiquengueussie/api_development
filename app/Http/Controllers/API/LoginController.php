<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginUserRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Les informations entrées sont incorrect.'],
            ]);
        }
        return response()->json(
            [
                "user" => $user,
                "token" => $user->createToken('laravel_token')->plainTextToken,
                "message" => "Vous êtes connecté"
            ]
        );
    }
}