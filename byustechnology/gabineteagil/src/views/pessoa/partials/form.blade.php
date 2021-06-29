<div class="container-fluid">
    <div class="form-group">
        {!! Form::label('codigo', 'Código da pessoa *') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
        <span class="form-text">Preencha um código para a pessoa. <span class="text-danger">Este campo deve ser único</span>.</span>
    </div>
    <div class="form-group">
        {!! Form::label('titulo', 'Título da pessoa *') !!}
        {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
        <span class="form-text">Preencha uma identificação para a pessoa.</span>
    </div>
   
    <hr>
    <div class="form-footer text-right">
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    </div>

</div>
