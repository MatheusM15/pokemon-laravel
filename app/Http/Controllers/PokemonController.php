<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{


    public function __construct(Pokemon $pokemon){
        $this->pokemon = $pokemon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->pokemon->getRules());
        $this->pokemon->create($request->all());
        
        return response()->json(['msg' => 'Cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = $this->pokemon->find($id);
        if($pokemon === null){
            return response()->json(['msg' => 'O pokemon não foi encontrado']);;
        }
        return response()->json($pokemon);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate($this->pokemon->getRules(),$this->pokemon->getFeedback());
        $pokemon = $this->pokemon->find($id);
        $pokemon->update($pokemon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon = $this->pokemon->find($id);
        $pokemon->delete();
        return response()->json(['msg' => 'Foi deletado com sucesso']);
    }
}
