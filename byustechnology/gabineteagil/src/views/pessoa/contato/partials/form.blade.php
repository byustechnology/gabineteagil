<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 form-group">
            {!! Form::label('tipo', 'Tipo do contato *') !!}
            {!! Form::select('tipo', [
            '' => 'Por favor, selecione...',
            ] + \ByusTechnology\Gabinete\Models\PessoaContato::TIPOS, null, ['class' => 'form-control']) !!}
            <span class="form-text">Por favor, informe o tipo de contato.</span>
        </div>
        <div class="col-lg form-group">
            {!! Form::label('titulo', 'Título do contato *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha uma identificação referente ao contato. <span class="text-success">Deixe este campo em branco caso queira que o sistema preencha automaticamente</span>.</span>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('valor', 'Valor do contato *') !!}
        {!! Form::text('valor', null, ['class' => 'form-control']) !!}
        <span class="form-text">
            O valor do contato se refere ao tipo do contato. Por exemplo:<br>
            - Se o tipo do contato for <strong class="text-success">WhatsApp</strong>, então devemos preencher o WhatsApp referente a pessoa;<br>
            - Se o tipo do contato for <strong class="text-success">Telefone fixo</strong>, devemos preencher o telefone fixo da pessoa;<br>
            - Se o tipo de contato estiver definido em <strong class="text-success">E-mail</strong>, devemos preencher o e-mail da pessoa neste campo;<br>
            E assim por diante...
        </span>
    </div>

    <div class="form-group">
        {!! Form::label('observacao', 'Observações') !!}
        {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 4]) !!}
        <span class="form-text">Informe uma observação para este tipo de contato. <span class="text-success">Este campo é opcional</span>.</span>
    </div>

    <hr>
    <div class="form-footer text-right">
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    </div>

</div>