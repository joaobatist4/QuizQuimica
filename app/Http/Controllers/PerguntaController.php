<?php namespace knowqui\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;

class PerguntaController extends Controller{

	public function lista(){
		if(Auth::check()){
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
	
		$tiposPerguntas = DB::select('select id, descricao from tipopergunta');

		return view('pergunta/cadastro-pergunta',['perguntas' => $perguntas,
		 'tiposPerguntas' => $tiposPerguntas]);
		}else{
			return redirect('/home');
		}
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

		DB::table('resposta')->insert([
			['descricao' => $respostaA, 'id_pergunta' => $idPergunta, 'ehCorreta' => ($respostaCorreta === "A"), '_index' => 'A']
		]);

		DB::table('resposta')->insert([
			['descricao' => $respostaB, 'id_pergunta' => $idPergunta, 'ehCorreta' => ($respostaCorreta === "B"), '_index' => 'B']
		]);

		DB::table('resposta')->insert([
			['descricao' => $respostaC, 'id_pergunta' => $idPergunta, 'ehCorreta' => ($respostaCorreta === "C"), '_index' => 'C']
		]);

		DB::table('resposta')->insert([
			['descricao' => $respostaD, 'id_pergunta' => $idPergunta, 'ehCorreta' => ($respostaCorreta === "D"), '_index' => 'D']
		]);

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
		
		$respostaA = $request->input('respostaA');
		$respostaB = $request->input('respostaB');
		$respostaC = $request->input('respostaC');
		$respostaD = $request->input('respostaD');
		$respostaCorreta = $request->input('edit_respostaCorreta');


		DB::table('pergunta')
			->where('id',$idPergunta)
			->update(['descricao' => $descricaoPergunta, 'id_nivel' => $nivelPergunta, 'id_tipo' => $tipoPergunta, 'tempo' => $tempoPergunta]);

		DB::table('resposta')
			->where('id', $idRespostaA)
			->update(['descricao' => $respostaA, 'ehCorreta' => $respostaCorreta === 'A']);

		DB::table('resposta')
			->where('id', $idRespostaB)
			->update(['descricao' => $respostaB, 'ehCorreta' => $respostaCorreta === 'B']);

		DB::table('resposta')
			->where('id', $idRespostaC)
			->update(['descricao' => $respostaC, 'ehCorreta' => $respostaCorreta === 'C']);

		DB::table('resposta')
			->where('id', $idRespostaD)
			->update(['descricao' => $respostaD, 'ehCorreta' => $respostaCorreta === 'D']);

		return redirect()->route('perguntaCadastro');

	}

	public function excluirPergunta($idPergunta){
		$resultado = DB::delete('delete from resposta where id_pergunta = '.$idPergunta);


		$mensagem = DB::delete('delete from pergunta where id = '.$idPergunta);
		

		return redirect()->route('perguntaCadastro');
	}

}