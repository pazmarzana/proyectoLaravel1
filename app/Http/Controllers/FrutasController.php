<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller
{
    // Accion que devuelva una vista
    // public function index(){
    // 	return view('frutas.index')
    // 	    	->with('frutas', array('naranja','pera','sandia','fresa','melon','piña'));
    // }

    // public function naranjas(){
    // 	return 'Accion de naranjas';
    // }

    // public function peras(){
    // 	return 'Accion de peras';
    // }
    public function getIndex(){
    	return view('frutas.index')
    	    	->with('frutas', array('naranja','pera','sandia','fresa','melon','piña'));
    }
    // public function index(){
    // 	return view('frutas.index')
    // 	    	->with('frutas', array('naranja','pera','sandia','fresa','melon','piña'));
    // }

    public function getNaranjas(){
    	return 'Accion de naranjas';
    }

    public function anyPeras(){
    	return 'Accion de peras';
    }

    public function recibirFormulario(Request $request){
    	$data = $request;
    	// var_dump($request);
    	// die();
    	// return 'El nombre de la fruta es: '.$data['nombre'];
    	return 'El nombre de la fruta es: ' .
		    	 $request->input('nombre') . 
		    	 '<br>'.
		    	'Cuya descripcion es: ' .
		    	 $request->input('descripcion');
    }

}
