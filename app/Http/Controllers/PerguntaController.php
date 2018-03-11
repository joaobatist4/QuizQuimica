<?php namespace knowqui\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Validator;

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
			            INNER JOIN tipopergunta on tipopergunta.id = pergunta.id_tipo ORDER BY pergunta.id DESC');
		//dd($perguntas);

		$respostas = DB::select('select id, descricao, ehCorreta, _index from resposta');
		
		$tiposPerguntas = DB::select('select id, descricao from tipopergunta');

		return view('pergunta/cadastro-pergunta',['perguntas' => $perguntas,
		 'respostas' => $respostas,
		 'tiposPerguntas' => $tiposPerguntas]);
	}

	public function insert(){
		return redirect('/pergunta/cadastro-pergunta');
	}


	public function inserirPerguntaResposta(Request $request){
		$descricaoPergunta = $request->input('descricaoPergunta');
		$nivelPergunta = $request->input('nivelPergunta');
		$tipoPergunta = $request->input('tipoPergunta');
		$tempoPergunta = $request->input('tempo');
		$respostaA = $request->input('respostaA');
		$respostaB = $request->input('respostaB');
		$respostaC = $request->input('respostaC');
		$respostaD = $request->input('respostaD');
		$respostaE = $request->input('respostaE');
		$respostaCorreta = $request->input('respostaCorreta');

		$arrayPergunta = array($descricaoPergunta, $tipoPergunta, $nivelPergunta, $tempoPergunta);

		//$caminhoDestino = $request->file('imagem')->store('public/img/');
		//$caminhoDestino = Storage::putFile('public/img/', $request->file('imagem'));
		

		

		$imagem = $request->file('imagem');
		//$imagem = Input::only('imagem');
		if ($imagem != null) {
			//$rules = array('imagem' => 'requires|max:10000|mimes:jpg, jpeg, png');	
			//$validator = Validator::make(['imagem' => $imagem], $rules);	
			
				//if (!($validator->fails())) {
					$caminhoDestino = public_path('img/questoes');
					$arquivoOriginal = $imagem->getClientOriginalName();
					$imagem->move( $caminhoDestino, $arquivoOriginal);	
				//}else{
				//	$arquivoOriginal = null;
				//	$caminhoDestino = null;
				//}
		}else{
			$arquivoOriginal = null;
			$caminhoDestino = null;
		}

		

		

		$idPergunta = DB::table('pergunta')->insertGetId(
			['descricao' => $descricaoPergunta, 'id_tipo' => $tipoPergunta, 'id_nivel' => $nivelPergunta,'tempo' => $tempoPergunta, 'imagem' => $arquivoOriginal, 'caminho_imagem' => $caminhoDestino]
		);



		DB::insert("insert into resposta (descricao, id_pergunta, ehCorreta, _index) 
    
        (SELECT '$respostaA',$idPergunta,'$respostaCorreta' = 'A', 'A' )
        UNION
        (SELECT '$respostaB',$idPergunta,'$respostaCorreta' = 'B', 'B' )
        UNION
        (SELECT '$respostaC',$idPergunta,'$respostaCorreta' = 'C', 'C' )
        UNION
        (SELECT '$respostaD',$idPergunta,'$respostaCorreta' = 'D', 'D' )
        UNION
        (SELECT '$respostaE',$idPergunta,'$respostaCorreta' = 'E', 'E' )
    	;");
		//return redirect->action('PerguntaController@lista');
		return redirect()->route('perguntaCadastro');

	}

	public function jsonRespotas($id){
		
		$respotas = DB::select('SELECT * FROM resposta WHERE id_pergunta = '.$id );

		return response()->json($respotas);
	}

	public function editarPerguntaResposta(Request $request){
		$idPergunta = $request->input('idPergunta');
		$descricaoPergunta = $request->input('descricaoPergunta');
		$nivelPergunta = $request->input('nivelPergunta');
		$tipoPergunta = $request->input('tipoPergunta');
		$tempoPergunta = $request->input('tempo');

		$idRespostaA = $request->input('idRespostaA');
		$idRespostaB = $request->input('idRespostaB');
		$idRespostaC = $request->input('idRespostaC');
		$idRespostaD = $request->input('idRespostaD');
		$idRespostaE = $request->input('idRespostaE');
		
		$respostaA = $request->input('respostaA');
		$respostaB = $request->input('respostaB');
		$respostaC = $request->input('respostaC');
		$respostaD = $request->input('respostaD');
		$respostaE = $request->input('respostaE');
		$respostaCorreta = $request->input('respostaCorreta');

		$updatePergunta = DB::update("update pergunta set descricao = '$descricaoPergunta',	id_nivel = $nivelPergunta, id_tipo = $tipoPergunta,	tempo = $tempoPergunta WHERE id = ".$idPergunta);

		$updateRespostaA = DB::update("update resposta set descricao = '$respostaA', ehCorreta = '$respostaCorreta' = 'A' where id = ".$idRespostaA);

		$updateRespostaB = DB::update("update resposta set descricao = '$respostaB', ehCorreta = '$respostaCorreta' = 'B' where id = ".$idRespostaB);

		$updateRespostaC = DB::update("update resposta set descricao = '$respostaC', ehCorreta = '$respostaCorreta' = 'C' where id = ".$idRespostaC);

		$updateRespostaD = DB::update("update resposta set descricao = '$respostaD', ehCorreta = '$respostaCorreta' = 'D' where id = ".$idRespostaD);

		$updateRespostaE = DB::update("update resposta set descricao = '$respostaE', ehCorreta = '$respostaCorreta' = 'E' where id = ".$idRespostaE);

		return redirect()->route('perguntaCadastro');

	}

	public function excluirPergunta($idPergunta){
		$resultado = DB::delete('delete from resposta where id_pergunta = '.$idPergunta);


		$mensagem = DB::delete('delete from pergunta where id = '.$idPergunta);
		

		return redirect()->route('perguntaCadastro');
	}

}