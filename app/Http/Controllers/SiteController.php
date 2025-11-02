<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request){
        $nome = 'Jose';
        return view('auth.login', compact('nome'));
    }

    public function dashboard(Request $request){
         return view('dashboard.index');
    }
}
