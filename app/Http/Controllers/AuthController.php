<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar credenciais
        $credentials = $request->only('email', 'password');

        // Verifica se as credenciais são válidas e gera o token
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        // Retorna o token JWT
        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        // Invalida o token JWT
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
