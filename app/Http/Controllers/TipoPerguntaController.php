<?php namespace knowqui\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;

class TipoPerguntaController extends Controller{

	public function lista(){
		if(Auth::check()){
			$tiposPerguntas = DB::select('select id, descricao from TipoPergunta');
			return view('pergunta/cadastro-tipo-pergunta')->with('tiposPerguntas',$tiposPerguntas);
		}else{
			return redirect('/home');
		}
	}

}