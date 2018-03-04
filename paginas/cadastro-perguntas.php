<?php include("../conexao.php");
        include("../cabecalho.php");
        include("../dao.php");?>

<h2>Cadastro de Perguntas</h2>

<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cadastrarPerguntaResposta">
  Cadastrar Perguntas
</button><br/><br/>


<table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Nível</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tempo</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>

<?php
    $perguntasRespostas = listarPerguntas($conexao);
    foreach($perguntasRespostas as $resultado ):
    
    ?>
        <tr>
            <td><?= $resultado['idPergunta'] ?></td>
            <td><?= $resultado['descricaoPergunta'] ?></td>
            <td><?= $resultado['nivel']?></td>
            <td><?= $resultado['tipo']?></td>
            <td><?= $resultado['tempoPergunta']?>min.</td>
            <td>
                <a href="#" role="button" data-toggle="modal" data-target="#cadastrarPerguntaResposta" 
                   descricao = "<?= $resultado['descricaoPergunta'] ?>" >
                <!--Imagem editar-->
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEFSURBVEhL7dHbCgFBGMDxuRDJWyieAS8jt0SaTa6U0xsoXPEGmBzKoXU+xYUHIBcW7yDN8GlW+wAzKzX/+m5mpv3tziLV33dJpXwGxlND06J8SX6N4cx/zBc2V01jMO8XwHxLXoA29YVBRvPbKZs7W/AYPyI+WkG+HcmRlr5knxnN718c4zE/JjZAaRUZrIrYlhTHVhyuHf45PyouK2qOicO1tydre1Bz9s0MsR2FddjnR8WlUIUKSaEKFdJPUIh2HfX3w5/2on3koRPXgw6cKysuFYW6JW/kobsZm7qYiUtHoXQisE5GQwzwz5d3HDXpKIRjwUM6Hlj1yt4wXDtfVv1zCL0A95vNfenIl0AAAAAASUVORK5CYII=">         
                </a>
                
                <a>
                <!--Imagem deletar-->
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEZSURBVEhL7dbNDYJAEAVgurAGLWNDaIIKOFMITWHAAvSqHjxzNNEYnUd2EgPsH8zKxZdMDOvOfMSLk/yzapo03VLtG6U2+ig46KUZdavUTh/ZA7TNsu6U50/6vM7B0XPIsoue0WGm/mo6jN7K8nWvqve5KB6hOKPoxQzMcuIt/bxHeks0cIXgQ5QLMzFbXxsHjUCGjT64CfV+cRuOwVMDFqOcEFwM5fjg4ijHNhjnUVCODY+Gckz4d4mjHBseDUVWgW0olzhuQvE8dSaC21AAKHHcheJ7lCjug+qr/V0TjhneeAjKWYzPQTmLcPqzrrGuDBtdKMf04v0KRLP1tXGwmBEivvrQc+dc+qSXPS+UA5zqt+vtP3GSJB8dMjDEDq+o8wAAAABJRU5ErkJggg==">
                </a>
            </td>
        </tr>
    
    <?php
        endforeach
    ?>

</table>

<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarPerguntaResposta" tabindex="-1" role="dialog" aria-labelledby="cadastrarPerguntaResposta" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarPerguntaResposta">Cadastrar Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="conteudoModalCadastro">
        
          <form action="adiciona-pergunta.php" method="post" enctype="multipart/form-data">

            <label for="descricaoPergunta" class="col-sm-2 col-form-label col-form-label-lg">Descrição</label>
            <div class="form-group row">
                <textarea class="form-control" id="descricaoPergunta" rows="4" name="descricaoPergunta" required></textarea>
            </div>

            <div class="form-group row">
        
                <div class="input-group-prepend">
                    <label for="nivelPergunta" class="col-sm-2 col-form-label">Nível </label>
                </div>
                <select class="input-group-text" id="nivelPergunta" name="nivelPergunta" required>
                    <option selected>Selecione...</option>    
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>

                <div class="input-group-prepend">
                    <label for="tipoPergunta" class="col-sm-4 col-form-label">Tipo Pergunta</label>
                </div>
                    <select class="input-group-text" id="tipoPergunta" name="tipoPergunta" required>
                        <option selected>Selecione...</option>

                    <?php 
                        $resultado = mysqli_query($conexao,"select * from tipopergunta");
                        while($tipos =  mysqli_fetch_assoc($resultado)){ ?>
                        <option value="<?php echo $tipos['id']?>"><?php echo $tipos['descricao']?></option>
                        <?php                                                               }
                    ?>

                    </select>

                <label for="tempo" class ="col-sm-1 col-form-label">Tempo</label>
                <div class="col-sm-2">
                    <input type="number" placeholder="Tempo" class="form-control" id="tempo" name="tempo" required/>min.
                </div>

            </div>

            <div class="form-group row">
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Imagem </span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem">
                        <label class="custom-file-label" for="inputGroupFile01">Selecione a imagem...</label>
                    </div>

                </div>
            </div>

            <div class="form-group row">
                <label for="respostaA" class="col-sm-2 col-form-label">A)</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Resposta A" class="form-control" id = "respostaA" name="respostaA" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaA" value="A" name="respostaCorreta" class="custom-control-input" checked>
                     <label class="custom-control-label" for="respostaCorretaA">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaB" class="col-sm-2 col-form-label">B)</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Resposta B" class="form-control" id="respostaB" name="respostaB" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaB" value="B" name="respostaCorreta" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaB">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaC" class="col-sm-2 col-form-label">C)</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Resposta C" class="form-control" id="respostaC" name="respostaC" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaC" name="respostaCorreta" value="C" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaC">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaD" class="col-sm-2 col-form-label">D)</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Resposta D" class="form-control" id="respostaD" name="respostaD" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaD" name="respostaCorreta" value="D" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaD">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaE" class="col-sm-2 col-form-label">E)</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Resposta E" class="form-control" id="respostaE" name="respostaE" required/>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaE" name="respostaCorreta" value="E" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaE">Correta</label>
                </div>
            </div>

    
    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
    
</form>
          
      </div>
    </div>
  </div>
</div> <!--Fim do modal cadastrar-->


<?php include("../rodape.php");?>