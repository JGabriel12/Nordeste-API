<?php

namespace App\Http\Controllers;

use App\Models\Estadia;
use App\Models\Mesa;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class MesaController extends Controller
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
        Mesa::create([
            'numero_mesa' => $request->numero_mesa
        ]);

        return "Mesa cadastrada com sucesso!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $mesa = Mesa::where('status_mesa', 1)->get();
        return $mesa;
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
        Mesa::where(['id' => $request->id])->update([
            'numero_mesa' => $request->numero_mesa
        ]);

        return "Mesa atualizada!";
    }

    public function updateStatus(Request $request)
    {
        //Excluir logicamente
        Mesa::where(['id' => $request->id])->update([
            'status_mesa' => $request->status_mesa
        ]);

        return "Mesa excluida!";
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
