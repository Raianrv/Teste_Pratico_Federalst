<?php

namespace App\Http\Controllers;

use App\Veiculo;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function adminIndex()
    {
        $veiculos = Veiculo::all();
        return view('layouts.admin', compact('veiculos'));
    }

    public function index()
    {
        return view('welcome');
    }
}
