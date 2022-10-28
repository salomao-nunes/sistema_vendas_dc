<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::all();

        return view('admin.cliente.show',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
        ]
        );

        $produto = Cliente::insert([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'registrado_por' => Auth::guard('admin')->user()->id,
            'data_registro' => Carbon::now(),
        ]);

        $notification =[
            'message' => 'Cliente registrado',
            'alert-type' => 'success'
        ];

        return redirect()->route('clientes.show')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Cliente::findOrFail($id);

        return view('admin.cliente.update', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ],
        [
            'nome.required' => 'Introduza o nome do cliente',
            'email.required' => 'Introduza o email'
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->nome = $request->nome;
        $cliente->email = $request->email;

        $cliente->save();

        $notification =[
            'message' => 'Cliente actualizado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('clientes.show')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente = Cliente::findOrFail($id)->delete();

        $notification =[
            'message' => 'Cliente eliminado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('clientes.show')->with($notification);
    }
}
