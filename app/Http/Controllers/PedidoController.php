<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Prato;
use App\Models\Estadia;
use Illuminate\Http\Request;

class PedidoController extends Controller
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

        Pedido::create([
            'status_pedido' => "Concluido!",
            'id_mesa' => $request->id_mesa,
            'id_prato' => $request->id_prato,
        ]);

        $id_estadia = $request->id_estadia;

        $valores_prato = Prato::select('valor_prato')
            ->where('id', '=', $request->id_prato)
            ->get();

        //Valor 01
        foreach ($valores_prato as $valor_prato_decimal) {
            $valor_prato_decimal->valor_prato;
        }

        $valor_atual = Estadia::select('valor_total_estadia')
            ->where('id', '=', $id_estadia)
            ->get();

        //Valor 02
        foreach ($valor_atual as $valor_atual_decimal) {
            $valor_atual_decimal->valor_total_estadia;
        }

        $valor_final = $valor_atual_decimal->valor_total_estadia + $valor_prato_decimal->valor_prato;


        Estadia::where(['id' => $id_estadia])->update([
            'valor_total_estadia' => $valor_final
        ]);

        return "<script>
        alert('Seu pedido foi registrado!');
        window.location.href='http://localhost/Nordeste-front-end/resources/html/pratos.html?id_mesa=$request->id_mesa&id_estadia=$id_estadia'
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
        $pedido = Pedido::find(['id' => $request->id]);

        return $pedido;
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
        Pedido::where(['id' => $request->id])->update([
            'status_pedido' => $request->status_pedido,
            'id_mesa' => $request->id_mesa,
            'id_prato' => $request->id_prato
        ]);

        return "Pedido atualizado!";
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
