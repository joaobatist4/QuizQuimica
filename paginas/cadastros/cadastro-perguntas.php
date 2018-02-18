<?php include("../../cabecalho.php");?>

<h2>Cadastro de Perguntas</h2>

<form action="#">

    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Descrição</label>
    <div class="form-group row">
        <textarea class="form-control" id="descricaoPergunta" rows="4" ></textarea>
    </div>
    
    <div class="form-group row">
        <label for="respostaA" class="col-sm-2 col-form-label">A)</label>
            <div class="col-sm-10">
                <input type="text" placeholder="Resposta A" class="form-control" id = "respostaA"/>
            </div>
    </div>
    
    <div class="form-group row">
        <label for="respostaB" class="col-sm-2 col-form-label">B)</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Resposta B" class="form-control" id="respostaB"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="respostaC" class="col-sm-2 col-form-label">C)</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Resposta C" class="form-control" id="respostaC"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="respostaD" class="col-sm-2 col-form-label">D)</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Resposta D" class="form-control" id="respostaD"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="respostaE" class="col-sm-2 col-form-label">E)</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Resposta E" class="form-control" id="respostaE"/>
        </div>
    </div>
    
    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
    
</form>


<?php include("../../rodape.php");?>