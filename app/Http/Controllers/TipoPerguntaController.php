<?php namespace knowqui\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TipoPerguntaController extends Controller{

	public function lista(){
		$tiposPerguntas = DB::select('select id, descricao from TipoPergunta');

		return view('pergunta/cadastro-tipo-pergunta')->with('tiposPerguntas',$tiposPerguntas);
	}

}