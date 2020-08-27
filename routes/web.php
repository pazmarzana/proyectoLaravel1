<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola-mundo', function () {
    return view('hola-mundo');
});

Route::get('/contacto/{nombre?}/{edad?}', function ($nombre="Victor",$edad=45) {
    return view('contacto.contacto')
        ->with ('nombre',$nombre)
        ->with ('edad',$edad)
        ->with('frutas', array('naranja','pera','sandia','fresa','melon','piña'));
})->where([
    'nombre'=>'[A-Za-z]+',
    'edad'=>'[0-9]+'
]);

// Route::get('/frutas','FrutasController@index');
// Route::get('/naranjas','FrutasController@naranjas');
// Route::get('/peras','FrutasController@peras');

// Route::resource('frutas','FrutasController');
// Route::get('/naranjas','FrutasController@naranjas');
// Route::any('/peras','FrutasController@peras');

//  Route::get('/frutas','FrutasController@getIndex');
//  Route::get('/naranjas/{admin?}',['middleware'=>'EsAdmin',
//   						  'uses'=>'FrutasController@getNaranjas'
//   						 ]);
//  Route::get('/naranjas','FrutasController@getNaranjas');
//  Route::get('/peras','FrutasController@anyPeras');


 Route::group(['prefix'=>'fruteria'], function(){

    Route::get('/frutas','FrutasController@getIndex');
    Route::get('/naranjas/{admin?}',['middleware'=>'EsAdmin',
                              'uses'=>'FrutasController@getNaranjas',
                              'as'=>'naranjitas'
                             ]);
    Route::get('/peras','FrutasController@anyPeras');

});

// Route::get('/recibir','FrutasController@recibirFormulario');
Route::post('/recibir','FrutasController@recibirFormulario');
// Route::resource('notas','NotesController');




Route::get('/notas','NotesController@getIndex');

Route::get('/notas/note/{id?}','NotesController@getNote', function($id=0){
    return view('notas.note')
    ->with ('id',$id);
}//fin funcion
);//fin del get

Route::get('/notas/save-note','NotesController@getSaveNote');

Route::post('/notas/note','NotesController@postNote');
Route::get('/notas/delete-note/{id?}','NotesController@getDeleteNote');
Route::get('/notas/update-note/{id?}','NotesController@getUpdateNote');
Route::post('/notas/update-note/{id?}','NotesController@postUpdateNote');