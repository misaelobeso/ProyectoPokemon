<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class principalController extends Controller
{
    public function index(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('principal', compact('tipos'));
    }

    public function inicio(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('inicio', compact('tipos'));
    }

    public function registrarPokemon(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('registrarPokemon', compact('tipos'));
    }

    public function consultarPokemons(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('consultarPokemons', compact('tipos'));
    }

    public function registrarTipo(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('registrarTipo', compact('tipos'));
    }

    public function consultarTipos(){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');
    	return view('consultarTipo', compact('tipos'));
    }

}
