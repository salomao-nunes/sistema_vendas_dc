<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos = Produto::all();

        return view('admin.produto.show',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $fornecedores = Fornecedor::all();


        return view('admin.produto.create', compact('fornecedores'));
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
            'id_fornecedor' => 'required',
        ],
        [
            'nome.required' => 'Introduza o nome do produto',
            'id_fornecedor.required' => 'Selecione um fornecedor',
        ]);

        $produto = Produto::insert([
            'nome' => $request->nome,
            'id_fornecedor' => $request->id_fornecedor,
        ]);

        $notification =[
            'message' => 'Produto registrado',
            'alert-type' => 'success'
        ];

        return redirect()->route('produtos.index')->with($notification);

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
        $produto = Produto::findOrFail($id);

        $fornecedores = Fornecedor::all();

        $fornecedor = Fornecedor::findOrFail($produto->id);

        return view('admin.produto.update', compact('produto','fornecedores', 'fornecedor'));
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

        $produto = Produto::findOrFail($id);

        $produto->nome = $request->nome;

        $produto->save();

        $notification =[
            'message' => 'Produto actualizado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('produtos.index')->with($notification);

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
        $fornecedor = Produto::findOrFail($id)->delete();

        $notification =[
            'message' => 'Produto eliminado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->route('produtos.index')->with($notification);
    }
}
