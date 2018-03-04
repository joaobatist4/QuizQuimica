<?php include("conexao.php");?>
<?php

/**########### TIPO PERGUNTA ###########**/
function inserirTipoPergunta($conexao,$descricao){
    //cria a string de insert
    $insert = "insert into tipopergunta(descricao) values ('$descricao')";
    //retorna o método na função
    return mysqli_query($conexao, $insert);    
}

function listarTipoPergunta($conexao){
    $resultado = mysqli_query($conexao,"select * from tipopergunta order by descricao ASC");
    return mysqli_fetch_assoc($resultado);
}

function adicionarPerguntaRespostas($conexao, $descricaoPergunta, $arrayRespostas, $tipoPergunta, $nivel, $tempo, $nome_imagem){
    $insertPergunta = "insert into pergunta (descricao, id_tipo, id_nivel, tempo, imagem) values ('$descricaoPergunta', $tipoPergunta, $nivel, $tempo, '$nome_imagem')";
    mysqli_query($conexao, $insertPergunta);
    
    $idPergunta = mysqli_insert_id($conexao);
    if($idPergunta){
        echo "Id Pergunta Gerada: ".$idPergunta."<br/>";    
    }else{
        echo "Error: ".mysqli_error($conexao)."<br/>";
    }
    
    $respostaCorreta = $arrayRespostas[5];
    
    $insertResposta = "insert into resposta (descricao, id_pergunta, ehCorreta) 
    
        (SELECT '$arrayRespostas[0]',$idPergunta,'$respostaCorreta' = 'A' )
        UNION
        (SELECT '$arrayRespostas[1]',$idPergunta,'$respostaCorreta' = 'B' )
        UNION
        (SELECT '$arrayRespostas[2]',$idPergunta,'$respostaCorreta' = 'C' )
        UNION
        (SELECT '$arrayRespostas[3]',$idPergunta,'$respostaCorreta' = 'D' )
        UNION
        (SELECT '$arrayRespostas[4]',$idPergunta,'$respostaCorreta' = 'E' )
    ;";
    
    $resultado = mysqli_query($conexao,$insertResposta);
    return $resultado;
}

function adicionarAluno($conexao, $arrayLogin, $arrayUsuario){
    $insertAluno = "insert into login(login, senha) values ('$arrayLogin[0]','$arrayLogin[1]')";
    $resultadoInsertAluno = mysqli_query($conexao, $insertAluno);
    
    $loginUsuario = $arrayLogin[0];
    
    if($resultadoInsertAluno){
        $resultadoInsertUsuario = $insertUsuario = "insert into usuario (nome, idade, serie, login) values ('$arrayUsuario[0]',$arrayUsuario[1],'$arrayUsuario[2],$loginUsuario')";        
    }else{
        echo "Erro na hora de inserir dados do usuario, por favor, contatar administrador do sistema!";
    }
    
    $resultados = array($resultadoInsertAluno, $resultadoInsertUsuario);
    
}

function listarPerguntas($conexao){
    $perguntasERespostas = array();
    //$consulta = "select * from pergunta INNER JOIN resposta on pergunta.id = resposta.id_pergunta;";
    $consulta = "select pergunta.id as idPergunta, 
		pergunta.descricao as descricaoPergunta,
        pergunta.tempo as tempoPergunta,
        pergunta.imagem as imgPergunta,
        nivel.descricao as nivel,
        tipopergunta.descricao as tipo
			from pergunta 
            INNER JOIN nivel on nivel.id = pergunta.id_nivel
            INNER JOIN tipopergunta on tipopergunta.id = pergunta.id_tipo;";
    $resultado = mysqli_query($conexao, $consulta);
    
    while($listaPerguntas = mysqli_fetch_assoc($resultado)){
        array_push($perguntasERespostas, $listaPerguntas);
    }
    
    return $perguntasERespostas;
    
}
    
?>