<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipos;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class tiposController extends Controller
{
    public function consultarTipos(){
        $tipos2=DB::table('tipos')->paginate(10);
        $tipos = DB::select('
    		select * 
			from tipos 
			where (	select count(*) 
			    	from pokemons_tipos
			    	where id_tipo = id 
			      	    and debilidad = 0) > 0');
        return view('consultarTipos', compact('tipos', 'tipos2'));
    }
}
