<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Mesa;
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

        //   Prato::find(['id' => $request->id]);

        /* $valor_prato = DB::table('pratos')
            ->where('id', '=', $request->id_prato)
            ->where($request->valor_prato, '=', 'valor_prato')
            ->get(); */

        $valores_prato = Prato::select('valor_prato')
            ->where('id', '=', $request->id_prato)
            ->get();

        $id_estadia = $request->id_estadia;


        foreach ($valores_prato as $valor_prato) {
            $valor_total_estadia = $valor_prato->valor_prato;
        }
        // increment
        Estadia::find($id_estadia)->increment(
            'valor_total_estadia',
            20
        );
        /* $valor_pratoJSON = Prato::where(['id' => $request->id_prato])->get('valor_prato');
        $valor_prato = json_decode($valor_pratoJSON); */

        /* window.location.href='http://localhost/Nordeste-front-end/resources/html/pratos.html?id_mesa=$request->id_mesa&id_estadia=$id_estadia->id'  */

        return "<script>
        alert('Seu pedido foi registrado!');
         
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
