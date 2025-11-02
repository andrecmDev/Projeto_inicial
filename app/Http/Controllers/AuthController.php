<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
//login

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       try {
        if(Auth::attempt($data)){
            $user = Auth::user();
            return redirect('/dashboard');
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }

//cadastro
    public function cadastrar(Request $request){
       $data = $request->validate([
                'nome' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required'],
        ]);
           

       try {
            User::create([
                'name' => $data['nome'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
             return json_encode([
                'status' => 'true',
                'message' => 'dados cadastrados com sucesso',
            ]);

        
       } catch (\Exception $th) {
            return json_encode([
                'status' => 'false',
                'message' => 'Erro ao cadastrar o usuário',
                'erro' => $th
                
            ]);
       }

    }

    
}
