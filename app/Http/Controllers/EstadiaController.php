<?php

namespace App\Http\Controllers;

use App\Models\Estadia;
use Illuminate\Http\Request;

class EstadiaController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Estadia::create([
            'horario_chegada' => $request->horario_chegada,
            'horario_saida' => $request->horario_saida,
            'data_atual' => $request->data_atual,
            'valor_total_estadia' => $request->valor_total_estadia,
            'status_mesa' => $request->status_mesa,
            'id_mesa' => $request->id_mesa
        ]);
        // return $request;
        return 'Cadastro realizado com sucesso!';
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
        Estadia::where(['id' => $request->id])->update([
            'horario_chegada' => $request->horario_chegada,
            'horario_saida' => $request->horario_saida,
            'valor_total_estadia' => $request->valor_total_estadia
        ]);

        return "Estadia atualizada!";
    }

    public function updateStatus(Request $request)
    {
        //Excluir logicamente
        Estadia::where(['id' => $request->id])->update([
            'status_estadia' => $request->status_estadia
        ]);

        return "Estadia excluida!";
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
