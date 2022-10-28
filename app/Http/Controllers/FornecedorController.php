<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fornecedores = Fornecedor::all();
        
        return view('admin.fornecedor.show', compact('fornecedores'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nome' => 'required'
        ],
        [
            'nome.required' => 'Introduza o nome do fornecedor'
        ]);

        $fornecedor = Fornecedor::insert([
            'nome' => $request->nome
        ]);

        $notification =[
            'message' => 'Fornecedor registrado',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

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

        $fornecedor = Fornecedor::findOrFail($id);

        return view('admin.fornecedor.update', compact('fornecedor'));

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
            'nome' => 'required'
        ],
        [
            'nome.required' => 'Introduza o nome do fornecedor'
        ]);

        $fornecedor = Fornecedor::findOrFail($id);

        $fornecedor->nome = $request->nome;

        $fornecedor->save();

        $notification =[
            'message' => 'Fornecedor actualizado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('fornecedores.show')->with($notification);
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
        // $fornecedor = Fornecedor::findOrFail($id)->delete();

        // $notification =[
        //     'message' => 'Fornecedor eliminado com sucesso',
        //     'alert-type' => 'success'
        // ];

        // return redirect()->route('fornecedores.show')->with($notification);

    }

}
