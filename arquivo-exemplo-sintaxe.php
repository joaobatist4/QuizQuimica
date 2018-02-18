<!-- declarção de variáveis -->
<?php 
    $curso = "Curso de PHP e Mysql I: Fundamentos para criação de um sistema web";

    //para imprimir um dado, usamos echo
    echo $curso;

    //condicionais
    $numero = 10;

    if($numero > 5){
        echo "Maior que 5!";
    }else{
        echo "Menor que 5!";
    }

    //repetições
    for ($i = 0; $i<5;$i++){
        //para concatenar uma string ou qualquer outra variável, usamos o .*(ponto)*
        echo "Laço de número: ".$i;
    }

    $condicao = 5;
    $i = 0;
    while($i < $condicao){
        echo "Laço de número: ".$i;
        $i++;
    }

    //array
    //no php, passamos para função array os valores que queremos colocar dentro da variável números
    $arrayNumeros = array(1,2,3,4,,6,7,8,9,0); 
    
    //para acessar as posições, fazemos +- assim:
    for($i=0;$i < 10; $i++){
        echo "Chave: ".$i." Valor: ".$numeros[$i];
    }

    //como não declaramos o tipo da variável, podemos também ter o seguinte array:
    $arrayMaluco = array(0,1,"banana","alura",4,5,"curso php",7,8,9);

    //declaração de função
    function mostraConteudoDoArray($array){
        for ($i=0; $i < sizeof($array); $i++){
            echo "Chave: ".$i." Valor: ".$array[$i];
        }
    }

    //fazer com que retorne um valor
    function somaDoisValores($n1, $n2){
        $soma = $n1 + $n2;
        return $soma;
    }

    $n1 = 34;
    $n2 = 23;
    $resultado = somaDoisValores($n1, $n2);
    echo $resultado;
    
    
?>