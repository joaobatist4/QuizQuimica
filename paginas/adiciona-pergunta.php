<?php include("../cabecalho.php");?>
<?php include("../conexao.php");?>
<?php include("../dao.php");?>

<?php

    $descricaoPergunta = $_GET["descricaoPergunta"];
    $respostaA = $_GET["respostaA"];
    $respostaB = $_GET["respostaB"];
    $respostaC = $_GET["respostaC"];
    $respostaD = $_GET["respostaD"];
    $respostaE = $_GET["respostaE"];

    $tipoPergunta = $_GET["tipoPergunta"];
    $nivel = $_GET["nivelPergunta"];
    $tempo = $_GET["tempo"];

    

    $arrayPerguntas = array($descricaoPergunta);
    $arrayRespostas = array($respostaA,$respostaB,$respostaC,$respostaD,$respostaE);

    $resultado = adicionarPerguntaRespostas($conexao, $arrayPerguntas, $arrayRespostas);

    if($resultado){
        echo 'deu certo';
    }else{
        echo 'deu merda'.mysqli_error($conexao);
    }
?>


<?php include("../rodape.php");?>