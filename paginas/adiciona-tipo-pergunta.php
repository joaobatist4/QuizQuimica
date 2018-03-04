<?php include("../cabecalho.php");?>
<?php include("../conexao.php");?>
<?php include("../dao.php");?>


<?php 
//pega o valor da página anterior
$descricaoTipoPergunta = $_GET["descricaoTipoPergunta"];
$resultado = inserirTipoPergunta($conexao,$descricaoTipoPergunta);
$tiposPergunta = listarTipoPergunta($conexao);
    
    if($resultado){
                   header("Location: cadastro-tipo-perguntas.php");
        die();
?>


<p class="alert-success">Tipo pergunta <?= $descricaoTipoPergunta?> adicionada.</p>

<?php 
    }else{
        $msg_error = mysqli_error($conexao);
?>

<p class="alert-danger">Tipo pergunta <?=$descricaoTipoPergunta?> não adicionada:<?=$msg_error?></p>

<?php
    }
?>

<?php include("../rodape.php");?>