@extends('layouts.principal')

@section('content')
<h2>Cadastro de Perguntas</h2>

<button type="button" class="btn btn-outline-primary create" data-toggle="modal" data-target="#cadastrarPerguntaResposta">
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
		@forelse ($perguntas as $pergunta )
			<tr>
				<td>{{$pergunta->idPergunta}} 		</td>
				<td>{{$pergunta->descricaoPergunta}}</td>
				<td>{{$pergunta->nivel}} 			</td>
				<td>{{$pergunta->tipo}} 			</td>
				<td>{{$pergunta->tempoPergunta}} 	</td>
				<td>
                <a href="#" class="edit" 
                    idPergunta ="{{$pergunta->idPergunta}}"  
                    descricaoPergunta = "{{$pergunta->descricaoPergunta}}"  
                    nivel = "{{$pergunta->nivelId}}"  
                    tipo="{{$pergunta->tipoperguntaId}}" 
                    tempoPergunta="{{$pergunta->tempoPergunta}}"
                    " >

                <!--Imagem editar-->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEFSURBVEhL7dHbCgFBGMDxuRDJWyieAS8jt0SaTa6U0xsoXPEGmBzKoXU+xYUHIBcW7yDN8GlW+wAzKzX/+m5mpv3tziLV33dJpXwGxlND06J8SX6N4cx/zBc2V01jMO8XwHxLXoA29YVBRvPbKZs7W/AYPyI+WkG+HcmRlr5knxnN718c4zE/JjZAaRUZrIrYlhTHVhyuHf45PyouK2qOicO1tydre1Bz9s0MsR2FddjnR8WlUIUKSaEKFdJPUIh2HfX3w5/2on3koRPXgw6cKysuFYW6JW/kobsZm7qYiUtHoXQisE5GQwzwz5d3HDXpKIRjwUM6Hlj1yt4wXDtfVv1zCL0A95vNfenIl0AAAAAASUVORK5CYII=">         
                </a>
                
                <a href="/excluir-pergunta/{{$pergunta->idPergunta}}">
                <!--Imagem deletar-->
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEZSURBVEhL7dbNDYJAEAVgurAGLWNDaIIKOFMITWHAAvSqHjxzNNEYnUd2EgPsH8zKxZdMDOvOfMSLk/yzapo03VLtG6U2+ig46KUZdavUTh/ZA7TNsu6U50/6vM7B0XPIsoue0WGm/mo6jN7K8nWvqve5KB6hOKPoxQzMcuIt/bxHeks0cIXgQ5QLMzFbXxsHjUCGjT64CfV+cRuOwVMDFqOcEFwM5fjg4ijHNhjnUVCODY+Gckz4d4mjHBseDUVWgW0olzhuQvE8dSaC21AAKHHcheJ7lCjug+qr/V0TjhneeAjKWYzPQTmLcPqzrrGuDBtdKMf04v0KRLP1tXGwmBEivvrQc+dc+qSXPS+UA5zqt+vtP3GSJB8dMjDEDq+o8wAAAABJRU5ErkJggg==">
                </a>
            </td>
			</tr>

            @empty

            <tr>
                <tr><p class="alert alert-primary">Não há nenhuma pergunta cadastrada</p><tr>
            </tr>

		@endforelse

</table>

<script>

    $(document).ready(function(){
        $(".create").click(function(){

            var modal = $("#cadastrarPerguntaResposta");

            modal.find("#idPergunta").empty();
            modal.find("#descricaoPergunta").empty();
            modal.find("#nivelPergunta").val("0");
            modal.find("#tipoPergunta").val("0");
            modal.find("#tempo").empty();
            modal.find("#respostaA").empty();
            modal.find("#respostaB").empty();
            modal.find("#respostaC").empty();
            modal.find("#respostaD").empty();
            modal.find("#respostaE").empty();
        });
    });



    $(document).ready(function(){
        $(".edit").click(function(){
            var idPergunta          = $(this).attr("idPergunta");
            var descricaoPergunta   = $(this).attr("descricaoPergunta");
            var nivel               = $(this).attr("nivel");
            var tipo                = $(this).attr("tipo");
            var tempoPergunta       = $(this).attr("tempoPergunta");
            console.log("Id Pergunta: " + idPergunta);
            var modal = $("#editarPerguntaResposta");

            modal.find("#edit_idPergunta").empty();
            modal.find("#edit_descricaoPergunta").empty();
            modal.find("#edit_nivelPergunta").val("0");
            modal.find("#edit_tipoPergunta").val("0");
            modal.find("#edit_tempo").empty();

            modal.find("#edit_idPergunta").val(idPergunta);
            modal.find("#edit_descricaoPergunta").html(descricaoPergunta);
            modal.find("#edit_nivelPergunta").val(nivel);
            modal.find("#edit_tipoPergunta").val(tipo);
            modal.find("#edit_tempo").val(tempoPergunta);

            $.ajax({
                url: "/jsonRespotas/"+idPergunta,
                type: 'GET',
                contentType: 'application/json',
                success: function(data) {
                    data.forEach(function(value){
                        switch (value._index) {
                            case 'A':
                                modal.find("#edit_idRespostaA").val(value.id);
                                modal.find("#edit_respostaA").empty();
                                modal.find("#edit_respostaA").val(value.descricao);
                                value.ehCorreta ==1 ? $("#edit_respostaCorretaA").prop("checked", true): ''; 
                                break;
                            case 'B':
                                modal.find("#edit_idRespostaB").val(value.id);
                                modal.find("#edit_respostaB").empty();
                                modal.find("#edit_respostaB").val(value.descricao);
                                value.ehCorreta ==1 ? $("#edit_respostaCorretaB").prop("checked", true):''; 
                                break;
                            case 'C':
                                modal.find("#edit_idRespostaC").val(value.id);
                                modal.find("#edit_respostaC").empty();
                                modal.find("#edit_respostaC").val(value.descricao);
                                value.ehCorreta ==1 ? $("#edit_respostaCorretaC").prop("checked", true): ''; 
                                break;
                            case 'D':
                                modal.find("#edit_idRespostaD").val(value.id);
                                modal.find("#edit_respostaD").empty();
                                modal.find("#edit_respostaD").val(value.descricao);
                                value.ehCorreta ==1 ? $("#edit_respostaCorretaD").prop("checked", true): ''; 
                                break;
                            case 'E':
                                modal.find("#edit_idRespostaE").val(value.id);
                                modal.find("#edit_respostaE").empty();
                                modal.find("#edit_respostaE").val(value.descricao);
                                value.ehCorreta ==1 ? $("#edit_respostaCorretaE").prop("checked", true): ''; 
                                break;
                        }
                    });
                    console.log(data)
                }
            });

            modal.modal('show');
        });
    });  
</script>

<div class="modal fade" id="cadastrarPerguntaResposta" tabindex="-1" role="dialog" aria-labelledby="cadastrarPerguntaResposta" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cadastrarPerguntaResposta">Cadastrar Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="conteudoModalCadastro">
        
          <form action="/insert-pergunta" method="post" enctype="multipart/form-data">

            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <label for="descricaoPergunta" class="col-sm-2 col-form-label col-form-label-lg">Descrição</label>
            <div class="form-group row">
                <textarea class="form-control col-sm-12" id="descricaoPergunta" rows="4" name="descricaoPergunta" required></textarea>
            </div>

            <div class="form-group row">
        
                <div class="input-group-prepend">
                    <label for="nivelPergunta" class="col-sm-2 col-form-label">Nível </label>
                </div>
                <select class="custom-select col-sm-2" id="nivelPergunta" name="nivelPergunta" required>
                    <option selected>Selecione...</option>    
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>

                <div class="input-group-prepend">
                    <label for="tipoPergunta" class="col-sm-2 ">Tipo Pergunta</label>
                </div>
                    <select class="custom-select col-sm-2" id="tipoPergunta" name="tipoPergunta" required>
                        <option selected>Selecione...</option>
                        @foreach ($tiposPerguntas as $tipo)
                        	<option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>

                <label for="tempo" class ="col-sm-1 col-form-label">Tempo</label>
                <div class="col-sm-2">
                    <input type="number" placeholder="Tempo" class="form-control" id="tempo" name="tempo" required/>
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
                <label for="respostaA" class="col-sm-1 col-form-label">A)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta A" class="form-control" id = "respostaA" name="respostaA" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaA" value="A" name="respostaCorreta" class="custom-control-input" checked>
                     <label class="custom-control-label" for="respostaCorretaA">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaB" class="col-sm-1 col-form-label">B)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta B" class="form-control" id="respostaB" name="respostaB" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaB" value="B" name="respostaCorreta" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaB">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaC" class="col-sm-1 col-form-label">C)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta C" class="form-control" id="respostaC" name="respostaC" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaC" name="respostaCorreta" value="C" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaC">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaD" class="col-sm-1 col-form-label">D)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta D" class="form-control" id="respostaD" name="respostaD" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaD" name="respostaCorreta" value="D" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaD">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaE" class="col-sm-1 col-form-label">E)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta E" class="form-control" id="respostaE" name="respostaE" required/>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="respostaCorretaE" name="respostaCorreta" value="E" class="custom-control-input">
                     <label class="custom-control-label" for="respostaCorretaE">Correta</label>
                </div>
            </div>

    <div class="modal-footer">
    	<button type="submit" class="btn btn-outline-success">Cadastrar</button>
    </div>
</form>
          
      </div>
    </div>
  </div>
</div> <!--Fim do modal cadastrar-->

<!-- Modal Editar -->
<div class="modal fade" id="editarPerguntaResposta" tabindex="-1" role="dialog" aria-labelledby="editarPerguntaResposta" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarPerguntaResposta">Editar Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  id="conteudoModalEditar">
        
          <form action="/editar-pergunta" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idPergunta" id = "edit_idPergunta"/>
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <label for="descricaoPergunta" class="col-sm-2 col-form-label col-form-label-lg">Descrição</label>
            <div class="form-group row">
                <textarea class="form-control col-sm-12" id="edit_descricaoPergunta" rows="4" name="descricaoPergunta" required></textarea>
            </div>

            <div class="form-group row">
        
                <div class="input-group-prepend">
                    <label for="nivelPergunta" class="col-sm-2 col-form-label">Nível </label>
                </div>
                <select class="custom-select col-sm-2" id="edit_nivelPergunta" name="nivelPergunta" required>
                    <option selected>Selecione...</option>    
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>

                <div class="input-group-prepend">
                    <label for="tipoPergunta" class="col-sm-2 ">Tipo Pergunta</label>
                </div>
                    <select class="custom-select col-sm-2" id="edit_tipoPergunta" name="tipoPergunta" required>
                        <option selected>Selecione...</option>
                        @foreach ($tiposPerguntas as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>

                <label for="tempo" class ="col-sm-1 col-form-label">Tempo</label>
                <div class="col-sm-2">
                    <input type="number" placeholder="Tempo" class="form-control" id="edit_tempo" name="tempo" required/>
                </div>

            </div>

            <div class="form-group row">
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Imagem </span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="edit_inputGroupFile01" name="imagem">
                        <label class="custom-file-label" for="inputGroupFile01">Selecione a imagem...</label>
                    </div>

                </div>
            </div>

            <div class="form-group row">
                <input type="hidden" name="idRespostaA" id="edit_idRespostaA"/>
                <label for="respostaA" class="col-sm-1 col-form-label">A)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta A" class="form-control" id = "edit_respostaA" name="respostaA" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="hidden" name="idRespostaB" id="edit_idRespostaB"/>
                    <input type="radio" id="edit_respostaCorretaA" value="A" name="edit_respostaCorreta" class="custom-control-input">
                     <label class="custom-control-label" for="edit_respostaCorretaA">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <label for="respostaB" class="col-sm-1 col-form-label">B)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta B" class="form-control" id="edit_respostaB" name="respostaB" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="edit_respostaCorretaB" value="B" name="edit_respostaCorreta" class="custom-control-input">
                     <label class="custom-control-label" for="edit_respostaCorretaB">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <input type="hidden" name="idRespostaC" id="edit_idRespostaC"/>
                <label for="respostaC" class="col-sm-1 col-form-label">C)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta C" class="form-control" id="edit_respostaC" name="respostaC" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="edit_respostaCorretaC" name="edit_respostaCorreta" value="C" class="custom-control-input">
                     <label class="custom-control-label" for="edit_respostaCorretaC">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <input type="hidden" name="idRespostaD" id="edit_idRespostaD"/>
                <label for="respostaD" class="col-sm-1 col-form-label">D)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta D" class="form-control" id="edit_respostaD" name="respostaD" required/>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="edit_respostaCorretaD" name="edit_respostaCorreta" value="D" class="custom-control-input">
                     <label class="custom-control-label" for="edit_respostaCorretaD">Correta</label>
                </div>

            </div>

            <div class="form-group row">
                <input type="hidden" name="idRespostaE" id="edit_idRespostaE"/>
                <label for="respostaE" class="col-sm-1 col-form-label">E)</label>
                <div class="col-sm-9">
                    <input type="text" placeholder="Resposta E" class="form-control" id="edit_respostaE" name="respostaE" required/>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="edit_respostaCorretaE" name="edit_respostaCorreta" value="E" class="custom-control-input">
                     <label class="custom-control-label" for="edit_respostaCorretaE">Correta</label>
                </div>
            </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success">Editar</button>
    </div>
</form>
          
      </div>
    </div>
  </div>
</div> <!-- Fim do modal Editar -->


@endsection