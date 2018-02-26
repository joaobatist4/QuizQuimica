<?php include("../cabecalho.php");?>
<?php include("../conexao.php");?>
<?php include("../dao.php");?>

<h2>Cadastro de Perguntas</h2>

<form action="adiciona-pergunta.php">

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
                
                <?php
                                                               }
            ?>
            
            </select>
        
        <label for="tempo" class ="col-sm-1 col-form-label">Tempo</label>
        <div class="col-sm-2">
            <input type="time" placeholder="Tempo" class="form-control" id="tempo" name="tempo" required/>
        </div>
            
    </div>

    <div class="form-group row">
        <label for="respostaA" class="col-sm-2 col-form-label">A)</label>
        <div class="col-sm-9">
            <input type="text" placeholder="Resposta A" class="form-control" id = "respostaA" name="respostaA" required/>
        </div>
        
        <div class="custom-control custom-radio">
            <input type="radio" id="respostaCorretaA" name="respostaCorreta" class="custom-control-input">
             <label class="custom-control-label" for="respostaCorretaA">Correta</label>
        </div>
        
    </div>
    
    <div class="form-group row">
        <label for="respostaB" class="col-sm-2 col-form-label">B)</label>
        <div class="col-sm-9">
            <input type="text" placeholder="Resposta B" class="form-control" id="respostaB" name="respostaB" required/>
        </div>
        
        <div class="custom-control custom-radio">
            <input type="radio" id="respostaCorretaB" name="respostaCorreta" class="custom-control-input">
             <label class="custom-control-label" for="respostaCorretaB">Correta</label>
        </div>
        
    </div>
    
    <div class="form-group row">
        <label for="respostaC" class="col-sm-2 col-form-label">C)</label>
        <div class="col-sm-9">
            <input type="text" placeholder="Resposta C" class="form-control" id="respostaC" name="respostaC" required/>
        </div>
        
        <div class="custom-control custom-radio">
            <input type="radio" id="respostaCorretaC" name="respostaCorreta" class="custom-control-input">
             <label class="custom-control-label" for="respostaCorretaC">Correta</label>
        </div>
        
    </div>
    
    <div class="form-group row">
        <label for="respostaD" class="col-sm-2 col-form-label">D)</label>
        <div class="col-sm-9">
            <input type="text" placeholder="Resposta D" class="form-control" id="respostaD" name="respostaD" required/>
        </div>
        
        <div class="custom-control custom-radio">
            <input type="radio" id="respostaCorretaD" name="respostaCorreta" class="custom-control-input">
             <label class="custom-control-label" for="respostaCorretaD">Correta</label>
        </div>
        
    </div>
    
    <div class="form-group row">
        <label for="respostaE" class="col-sm-2 col-form-label">E)</label>
        <div class="col-sm-9">
            <input type="text" placeholder="Resposta E" class="form-control" id="respostaE" name="respostaE" required/>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="respostaCorretaE" name="respostaCorreta" class="custom-control-input">
             <label class="custom-control-label" for="respostaCorretaE">Correta</label>
        </div>
    </div>
   
    
    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
    
</form>


<?php include("../rodape.php");?>