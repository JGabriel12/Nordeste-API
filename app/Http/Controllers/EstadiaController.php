<?php

namespace App\Http\Controllers;

use App\Models\Estadia;
use App\Models\Prato;
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
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y/m/d');
        $horario_atual = date('h:i:s');
        Estadia::create([
            'horario_chegada' => $horario_atual,
            'horario_saida' => $request->horario_saida,
            'data_atual' => $data_atual,
            'valor_total_estadia' => $request->valor_total_estadia,
            'id_mesa' => $request->id_mesa
        ]);
        $id_estadia = Estadia::latest('id')->first();

        return "<script>
        
        alert('Sua estadia foi registrada!');
        window.location.href='http://localhost/Nordeste-front-end/resources/html/pratos.html?id_mesa=$request->id_mesa&id_estadia=$id_estadia->id'
        </script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $estadia = Estadia::find(['id' => $request->id]);

        return $estadia;
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

    public function updateFimEstadia(Request $request)
    {
        // *INPUT HIDDEN SÓ FUNCIONA UMA VEZ

        //Atualizar horario de saida
        date_default_timezone_set('America/Sao_Paulo');
        $horario_atual = date('h:i:s');

        Estadia::where(['id' => $request->id_estadia])->update([
            'status_estadia' => 0
        ]);

        Estadia::where(['id' => $request->id_estadia])->update([
            'horario_saida' => $horario_atual
        ]);

        return "<script>
        window.location.href='http://localhost/Nordeste-front-end/resources/html/load.html'
        </script>";
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
