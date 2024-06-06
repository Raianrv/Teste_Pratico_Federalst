<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\VeiculoNotification;
use App\User;
use App\Veiculo; 

class VeiculosController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('layouts.admin', compact('veiculos'));
    }

    public function create()
    {
        $users = \App\User::all(); 
        return view('layouts.create', compact('users')); 
    }

    public function store(Request $request)
    {
        $validator = Veiculo::validateData($request->all());


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $veiculo = new Veiculo;

        $veiculo->placa = $request->placa;
        $veiculo->renavam = $request->renavam;
        $veiculo->modelo = $request->modelo;
        $veiculo->marca = $request->marca;
        $veiculo->ano = $request->ano;
        $veiculo->proprietario_id = $request->proprietario_id;
        $veiculo->save();

        $proprietario = User::find($request->proprietario_id);
        $proprietario->notify(new VeiculoNotification($veiculo, 'created'));

         return redirect()->route('admin.home')->with('success', 'Veículo criado com sucesso!');
    }

    public function show(Veiculo $veiculo)
    {
        return view('layouts.show', compact('veiculo'));
    }

    public function edit(Veiculo $veiculo)
    {
        return view('layouts.edit', compact('veiculo'));
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $validator = Veiculo::validateData($request->all(), $veiculo->id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $veiculo->update($request->all());

        $proprietario = User::find($veiculo->proprietario_id);
        $proprietario->notify(new VeiculoNotification($veiculo, 'updated'));

        return redirect()->route('admin.home')->with('success', 'Veículo atualizado com sucesso!');

    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return redirect()->route('admin.home');
    }

    public function meusVeiculos()
    {
        $user = Auth::user();
        $veiculos = $user->veiculos;
        return view('layouts.meus_veiculos', compact('veiculos'));
    }
}
