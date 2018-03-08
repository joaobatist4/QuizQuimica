<?php namespace knowqui\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PerguntaController extends Controller{

	public function lista(){
		
		$perguntas = DB::select('select pergunta.id as idPergunta, 
					pergunta.descricao as descricaoPergunta,
			        pergunta.tempo as tempoPergunta,
			        pergunta.imagem as imgPergunta,
			        tipopergunta.id as tipoperguntaId,
			        nivel.descricao as nivel,
			        nivel.id as nivelId,
			        tipopergunta.descricao as tipo
						from pergunta 
			            INNER JOIN nivel on nivel.id = pergunta.id_nivel
			            INNER JOIN tipopergunta on tipopergunta.id = pergunta.id_tipo');
		//dd($perguntas);

		$respostas = DB::select('select id, descricao, ehCorreta, _index from resposta');
		
		$tiposPerguntas = DB::select('select id, descricao from tipopergunta');

		return view('pergunta/cadastro-pergunta',
		['perguntas' => $perguntas,
		 'respostas' => $respostas,
		 'tiposPerguntas' => $tiposPerguntas]);
	}

}