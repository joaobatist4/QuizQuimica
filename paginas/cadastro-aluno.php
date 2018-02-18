<?php include("../cabecalho.php");?>

<h2>Cadastro de aluno</h2>

<form action="#">

    <div class="form-group row">
        <label for="nomeAluno" class="col-sm-2 col-form-label">Nome do Aluno:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Nome do aluno" id="nomeAluno" class="form-control"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="idadeAluno" class="col-sm-2 col-form-label">Idade:</label>
        <div class="col-sm-2">
            <input type="number" placeholder="Idade do Aluno" id="idadeAluno" class="form-control"/>
        </div>
        
        <label for="serieAluno" class="col-sm-2 col-form-label">Série:</label>
        <div class="col-sm-2">
            <input type="text" placeholder="Série" id="serieAluno" class="form-control"/>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="usuario" class="col-sm-2 col-form-label">Login:</label>
        <div class="col-sm-2">
            <input type="text" placeholder="Login" id="usuario" class="form-control" />
        </div>
        
        <label for="passwordUsuario" class="col-sm-2 col-form-label">Password:</label>
        <div class="col-sm-2">
            <input type="password" placeholder="Senha" id="passwordUsuario" class="form-control"/>
        </div>
        
        <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password:</label>
        <div class="col-sm-2">
            <input type="password" placeholder="Confirmar Senha" id="confirmPassword" class="form-control"/>
        </div>    
    </div>
    
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>

</form>

<?php include("../rodape.php");?>