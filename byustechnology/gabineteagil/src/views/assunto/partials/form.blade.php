<div class="container-fluid">
    <div class="form-group">
        {!! Form::label('codigo', 'Código do assunto *') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
        <span class="form-text">Preencha um código para o assunto. <span class="text-danger">Este campo deve ser único</span>.</span>
    </div>
    <div class="form-group">
        {!! Form::label('titulo', 'Título do assunto *') !!}
        {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
        <span class="form-text">Preencha uma identificação para o assunto.</span>
    </div>

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição') !!}
        {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 5]) !!}
        <span class="form-text">Informe uma descrição para o assunto. <span class="text-success">Este campo é opcional</span>.</span>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('cor', 'Cor (identificação)') !!}
                {!! Form::input('color', 'cor', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma cor para identificar o assunto. <span class="text-success">Se nenhuma cor for selecionada, será considerada a cor preta.</span></span>
            </div>
        </div>
    </div>
    
    <hr>
    <div class="form-footer text-right">
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    </div>

</div>
