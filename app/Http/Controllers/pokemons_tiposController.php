<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pokemons_tipos;
use App\pokemons;
use App\tipos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class pokemons_tiposController extends Controller
{
    public function agregarTipo(Request $request, $id_pokemon){
        $id_tipo=$request->input('id_tipo');

        //Guardar en BD
        $nuevo = new pokemons_tipos;
        $nuevo->id_pokemon= $id_pokemon;
        $nuevo->id_tipo=$id_tipo;
        $nuevo->save();

        //////
        $tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');


        $pokemon = pokemons::find($id_pokemon);
        $tiposP = DB::select('
            select * 
            from tipos 
            where id not in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);
        $tiposP2 = DB::select('
            select * 
            from tipos 
            where id in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);

        return view('administrarPokemon', compact('pokemon', 'tiposP', 'tiposP2', 'tipos'));
    }

    public function quitarTipo($id_pokemon, $id_tipo){
        $deleted = DB::delete('
            delete from pokemons_tipos 
            where id_pokemon = ? and id_tipo = ?', [$id_pokemon, $id_tipo]);

        //////
        $tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');


        $pokemon = pokemons::find($id_pokemon);
        $tiposP = DB::select('
            select * 
            from tipos 
            where id not in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);
        $tiposP2 = DB::select('
            select * 
            from tipos 
            where id in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);

        return view('administrarPokemon', compact('pokemon', 'tiposP', 'tiposP2', 'tipos'));
    }

    public function quitarTipo2($id_pokemon, $id_tipo){
        $deleted = DB::delete('
            delete from pokemons_tipos 
            where id_pokemon = ? and id_tipo = ?', [$id_pokemon, $id_tipo]);

        return Redirect('/consultarPorTipo/'.$id_tipo);
    }

    public function administrarPokemon($id_pokemon){
        $tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');


        $pokemon = pokemons::find($id_pokemon);
        $tiposP = DB::select('
            select * 
            from tipos 
            where id not in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);
        $tiposP2 = DB::select('
            select * 
            from tipos 
            where id in (select id_tipo 
                         from pokemons_tipos   
                         where id_pokemon = ?)', [$id_pokemon]);

        return view('administrarPokemon', compact('pokemon', 'tiposP', 'tiposP2', 'tipos'));
    }

}
