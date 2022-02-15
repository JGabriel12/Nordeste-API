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
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y/m/d');
        $horario_atual = date('h:i:s');
        Estadia::create([
            'horario_chegada' => $horario_atual,
            'horario_saida' => $request->horario_saida,
            'data_atual' => $data_atual,
            'valor_total_estadia' => $request->valor_total_estadia,
            'id_pedido' => $request->id_pedido,
            'id_mesa' => $request->id_mesa
        ]);
        return "<script>
        alert('Sua estadia foi registrada!');
        window.location.href='http://localhost/Nordeste-front-end/resources/html/pratos.html?id_mesa=$request->id_mesa'
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
    public function update(Request $request)
    {
        Estadia::where(['id' => $request->id])->update([
            'id_pedido' => $request->id_pedido,
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


    public function updateFimEstadia(Request $request)
    {
        //Atualizar horario de saida

        date_default_timezone_set('America/Sao_Paulo');
        $horario_atual = date('h:i:s');

        Estadia::where(['id' => $request->id_estadia])->update([
            'horario_saida' => $horario_atual
        ]);

        return $request;
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
