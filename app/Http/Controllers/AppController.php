<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function register(Request $request)
    {
        return view('auth/register');
    }

    public function login(Request $request)
    {
        return view('auth/login');
    }
}
