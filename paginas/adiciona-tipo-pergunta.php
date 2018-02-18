<?php include("../cabecalho.php");?>

<?php 
//pega o valor da página anterior
    $descricaoTipoPergunta = $_GET["descricaoTipoPergunta"];

$conexao = mysqli_connect('localhost:3306','root','root','knowqui');
$query = "insert into tipopergunta(descricao) values ('{$descricaoTipoPergunta}')";

mysqli_query($conexao,$query);
mysqli_close($conexao);

?>
 
<p class="alert-success">Tipo pergunta <?= $descricaoTipoPergunta?> adicionada.</p>
<?php include("../rodape.php");?>