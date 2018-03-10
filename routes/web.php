<?php

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

Route::get('/', function (){
	return view('home/home');}
);

Route::get('/home', function () {
    return view('home/home');
});

Route::get('/cadastro-pergunta', 'PerguntaController@lista')->name('perguntaCadastro');

Route::get('/cadastro-tipo-pergunta', 'TipoPerguntaController@lista');
Route::post('/insert-pergunta', 'PerguntaController@inserirPerguntaResposta');


Route::get('/jsonRespotas/{id}', 'PerguntaController@jsonRespotas')->where('id','[0-9]+');