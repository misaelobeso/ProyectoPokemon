<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pokemons;
use App\tipos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class pokemonsController extends Controller
{
    public function guardar(Request $request){
        $nombre=$request->input('nombre');
        $descripcion=$request->input('descripcion');
        $peso=$request->input('peso');
        $altura=$request->input('altura');
        $caramelos=$request->input('caramelos');
        $puntos_combate=$request->input('puntos_combate');
        $vida=$request->input('vida');
        $defensa=$request->input('defensa');
        $velocidad=$request->input('velocidad');
        $imagen="";
        $cantidad_caramelos=0;

        //Guardar en BD

        $nuevo = new pokemons;
        $nuevo->nombre=$nombre;
        $nuevo->descripcion=$descripcion;
        $nuevo->peso=$peso;
        $nuevo->altura=$altura;
        $nuevo->caramelos=$caramelos;
        $nuevo->puntos_combate=$puntos_combate;
        $nuevo->vida=$vida;
        $nuevo->defensa=$defensa;
        $nuevo->velocidad=$velocidad;
        $nuevo->imagen=$imagen;
        $nuevo->cantidad_caramelos=$cantidad_caramelos;
        $nuevo->save();

        return Redirect('/consultarPokemons');
    }

    public function actualizar($id){
        $tipos = DB::select('
            select * 
            from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');

        $pokemon = pokemons::find($id);
        return view('actualizarPokemon', compact('pokemon', 'tipos'));
    }

    public function actualizarPokemon($id, Request $datos){
        $pokemon = pokemons::find($id);
        $pokemon->nombre = $datos->input('nombre');
        $pokemon->descripcion = $datos->input('descripcion');
        $pokemon->peso = $datos->input('peso');
        $pokemon->altura = $datos->input('altura');
        $pokemon->caramelos = $datos->input('caramelos');
        $pokemon->puntos_combate = $datos->input('puntos_combate');
        $pokemon->vida = $datos->input('vida');
        $pokemon->defensa = $datos->input('defensa');
        $pokemon->velocidad = $datos->input('velocidad');
        $pokemon->imagen = "";
        $pokemon->cantidad_caramelos = 0;
        $pokemon->save();

        return Redirect('/consultarPokemons');
    }

    public function eliminar($id){
        pokemons::find($id)->delete();
        return Redirect('/consultarPokemons');
    }

    public function consultarPokemons(){ 
    	$tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');
        $pokemons=DB::table('pokemons')->paginate(10);
        return view('consultarPokemons', compact('pokemons', 'tipos'));
    }

    public function consultarPorTipo($id_tipo){
    	$tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');

    	$pokemons_tipos = DB::select('
    		select P.nombre as pokemon, T.nombre as tipo, PT.id_pokemon, PT.id_tipo
    		from pokemons as P 
    			inner join pokemons_tipos as PT 
    			on P.id = PT.id_pokemon 
    			inner join tipos as T 
    			on PT.id_tipo = T.id 
    		where T.id = ? 
    			and debilidad = 0', [$id_tipo]);

        return view('consultarPorTipo', compact('pokemons_tipos', 'tipos'));
    }

    public function pdfPokemons(){
        $pokemons=pokemons::all();

        $vista=view('pdfPokemons', compact('pokemons'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }

    public function pdfPokemon($id){
        $pokemon=pokemons::find($id);

        $vista=view('pdfPokemon', compact('pokemon'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }




////////////////////////
    public function pruebas(){
        $tipos = DB::select('
           select * 
             from tipos 
            where ( select count(*) 
                    from pokemons_tipos
                    where id_tipo = id 
                        and debilidad = 0) > 0');

        return view('pruebas', compact('tipos'));
    }

}
