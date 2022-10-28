<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vendedor.auth.login');
    }

    public function dashboard(){
        return view('vendedor.index');
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
                //
                $validate = $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'email.required' => 'Você não introduziu um e-mail',
                    'password.required' => 'Você não introduziu a senha',
                ]        
            );
        
                $fields = $request->all();
        
                if(Auth::guard('vendedor')->attempt(['email' => $fields['email'], 'password' => $fields['password']])){
                    
                    $notification = [
                        'message' => 'Login efectuado com sucesso',
                        'alert-type' => 'success'
                    ];
        
                    return redirect()->route('vendedor.dashboard')->with($notification);
                }else{
        
                    $error = [
                        'message'=> 'E-mail ou senha errada',
                        'alert-type'=> 'warning'
                    ];
        
                    return redirect()->back()->with($error);
                }

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
    }
}
