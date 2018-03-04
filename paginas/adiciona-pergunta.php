<?php include("../cabecalho.php");?>
<?php include("../conexao.php");?>
<?php include("../dao.php");?>

<?php

    $descricaoPergunta = $_POST["descricaoPergunta"];
    $respostaA = $_POST["respostaA"];
    $respostaB = $_POST["respostaB"];
    $respostaC = $_POST["respostaC"];
    $respostaD = $_POST["respostaD"];
    $respostaE = $_POST["respostaE"];

    $tipoPergunta = $_POST["tipoPergunta"];
    $nivel = $_POST["nivelPergunta"];
    $tempo = $_POST["tempo"];
    $respostaCorreta = $_POST["respostaCorreta"];

    $imagem = $_FILES["imagem"];

    if(!empty($imagem["name"])){
        $largura = 150;
        $altura = 180;
        $tamanho = 1000;
        
        
        $error = array();
        
        //verifica se o arquivo é uma imagem
        if(!preg_match("/image\/(pjpeg|jpeg|png|gi|bpm)$/", $imagem["type"])){
            $error[1] = "Isso não é uma imagem.";
        }
        
        //$dimensoes = getimagesize($imagem["tmp_name"]);
        
        // Verifica se a largura da imagem é maior que a largura permitida
		//if($dimensoes[0] > $largura) {
		//	$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		//}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		//if($dimensoes[1] > $altura) {
		//	$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		//}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		//if($foto["size"] > $tamanho) {
   		// 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		//}
        
        //Se não houver nenhum erro
        if(count($error) == 0){
            //Pega a extensão da imagem
            preg_match("/\.(gif|bpm|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
            
            //gerar o nome da imagem
            $nome_imagem = md5(uniqid(time())).".".$ext[1];
            
            //Caminho da imagem
            $caminho_imagem = "../img/".$nome_imagem;
            
            //Faz upload para o respectivo diretorio
            move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
            
           
              
        }
        
    }

        echo "Nivel: ".$nivel."<br/>";
        echo "Tempo: ".$tempo."<br/>";
        echo "Tipo Pergunta: ".$tipoPergunta."<br/>";
        echo "Resposta Correta: ".$respostaCorreta."<br/>";

        $arrayPerguntas = array($descricaoPergunta);
        $arrayRespostas = array($respostaA,$respostaB,$respostaC,$respostaD,$respostaE, $respostaCorreta);

        $resultado = adicionarPerguntaRespostas($conexao, $descricaoPergunta, $arrayRespostas, $tipoPergunta, $nivel, $tempo, $nome_imagem, $caminho_imagem);

        if($resultado){

        }else{
            $errorSQL = mysqli_error($conexao);
            echo 'deu merda'.mysqli_error($conexao);
        }

        if(count($error) > 0){
            foreach($error as $erro){
                echo $erro."<br/>";
            }
        }

?>
<?php include("../rodape.php");?>