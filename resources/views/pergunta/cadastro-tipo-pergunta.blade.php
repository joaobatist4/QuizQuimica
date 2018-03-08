@extends('layouts.principal')

@section('content')
<h2>Cadastro Tipo Pergunta</h2>
<div class="col-sm-2">
    <br/>
    
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#inserirTipoPergunta">
  Inserir Tipo de Pergunta
</button>

</div>

<div class="modal fade" id="inserirTipoPergunta" tabindex="-1" role="dialog" aria-labelledby="inserirTipoPergunta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inserirTipoPergunta">Tipo de Pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <form action="adiciona-tipo-pergunta.php">
              <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Descrição</label>
          
                  <div class="col-sm-10">
                    <input type="text" placeholder="Descrição" class="form-control" id="descricaoTipoPergunta" name="descricaoTipoPergunta" required/>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success" >Salvar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection