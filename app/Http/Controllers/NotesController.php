<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function getIndex(){
        //para listar todas las notas
        // $notas = DB::table('notes')->get();
        // $notes = DB::table('notes')->get();
        //var_dump($notas);
        // foreach($notas as $note){
        //     echo $note->title."<br>";
        // }
        $notes = DB::table('notes')->orderBy('id','desc')->get();
        
        
        //return 'Index notas';
        return view('notes.index',array(
            "notes"=> $notes
            )//fin del array
        );//fin de la view
    }//cierre funcion

    public function getNote($id){
        $note=DB::table('notes')->where('id',$id)
                                ->first();
        if(empty($note)){
            return redirect()->action('NotesController@getIndex');
        }   //fin if                             
        return view('notes.note',array(
            'note'=>$note
            )//fin array
        );//fin view                                
    }//fin function

    //funcion para insertar en la base de datos
    public function postNote(Request $request){
        $note=DB::table('notes')->insert(array(
            'title'=>$request->input('title'),
            'description'=>$request->input('description')
        )//fin array
        );
        return redirect()->action('NotesController@getIndex');
    }//fin function

    //funcion para devolver una vista
    public function getSaveNote(){
        return view('notes.saveNote');
    }//fin function

    public function getDeleteNote($id){
        $note=DB::table('notes')->where('id',$id)
                                ->delete();
        return redirect()->action('NotesController@getIndex')
                        ->with('status','Nota borrada correctamente');
    }//fin function

    //graba un dato modificado en la base de datos
    public function postUpdateNote($id,Request $request){
        $note=DB::table('notes')->where('id',$id)
                                ->update(
                                    array(
                                        'title'=>$request->input('title'),
                                        'description'=>$request->input('description')
                                    )//fin array
                                );//fin del update e instruccion
        return redirect()->action('NotesController@getIndex')
                        ->with('status','Nota actualizada correctamente');
    }//fin function

    //funcion que muestra lo que ya habia en ese registro
    public function getUpdateNote($id){
        $note=DB::table('notes')->where('id',$id)
                                ->first();
                   
        //vuelvo a reutilzar el mimo formulario
       return view('notes.saveNote',array(
            'note'=>$note
            )//fin array
        );//fin view                                
    }//fin function





}//fin de class
