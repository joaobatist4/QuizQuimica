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

function adicionarPerguntaRespostas($conexao, $arrayPergunta, $arrayRespostas){
    $insertPergunta = "insert into pergunta (descricao) values ('$arrayPergunta[0]')";
    mysqli_query($conexao, $insertPergunta);
    
    $idPergunta = mysqli_insert_id($conexao);
    echo $idPergunta;
    $insertRespostaA = "insert into resposta (descricao, id_pergunta) values('$arrayRespostas[0]',$idPergunta)";
    $insertRespostaB = "insert into resposta (descricao, id_pergunta) values('$arrayRespostas[1]',{$idPergunta})";
    $insertRespostaC = "insert into resposta (descricao, id_pergunta) values('$arrayRespostas[2]',{$idPergunta})";
    $insertRespostaD = "insert into resposta (descricao, id_pergunta) values('$arrayRespostas[3]',{$idPergunta})";
    $insertRespostaE = "insert into resposta (descricao, id_pergunta) values('$arrayRespostas[4]',{$idPergunta})";
    
    $resultadoA = mysqli_query($conexao, $insertRespostaA);
    $resultadoB = mysqli_query($conexao, $insertRespostaB);
    $resultadoC = mysqli_query($conexao, $insertRespostaC);
    $resultadoD = mysqli_query($conexao, $insertRespostaD);
    $resultadoE = mysqli_query($conexao, $insertRespostaE);
    
    $arrayResultado = array($resultadoA,$resultadoB,$resultadoC,$resultadoD,$resultadoE);
    return $arrayResultado;
}
    
?>