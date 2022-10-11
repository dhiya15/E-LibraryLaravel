<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Livre;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $request = $request->validated();
        $etudiant = Etudiant::where('email', $request['email'])->first();
        $livres = Livre::where('matière', $etudiant->matière)->limit(10);
        if (!$etudiant || !Hash::check($request['password'], $etudiant->mot_de_passe)) {
            return response()->json([
                'errors' => [
                    'success' => false,
                    'message' => 'Login information is invalid.'
                ]
            ], 402);
        } else {
            $token = $etudiant->createToken('authToken')->plainTextToken;
            return response()->json([
                'success' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'student' => $etudiant,
                'books' => $livres
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = Etudiant::find(Auth::id());
        $user->tokens()->delete();
        return response()->json([
            'success' => true
        ]);
    }


}
