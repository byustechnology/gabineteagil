<div class="container-fluid">

    @component('ui::card')

        @slot('title')
            Informações do orgão responsável
        @endslot

        <div class="form-group">
            {!! Form::label('codigo', 'Código do orgão responsável *') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha um código para o orgão responsável. <span class="text-danger">Este campo deve ser único. Deixe em branco para o sistema popular automaticamente</span>.</span>
        </div>
        <div class="form-group">
            {!! Form::label('titulo', 'Título do orgão responsável *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha uma identificação para o orgão responsável.</span>
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 5]) !!}
            <span class="form-text">Informe uma descrição para o orgão responsável. <span class="text-success">Este campo é opcional</span>.</span>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::label('cor', 'Cor (identificação)') !!}
                    {!! Form::input('color', 'cor', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe uma cor para identificar o orgão responsável. <span class="text-success">Se nenhuma cor for selecionada, será considerada a cor preta.</span></span>
                </div>
            </div>
        </div>
    @endcomponent

    @component('ui::card')
        @slot('title')
            Informações do responsável
        @endslot

        <div class="row">
            <div class="col-lg-6 form-group">
                {!! Form::label('responsavel', 'Responsável') !!}
                {!! Form::text('responsavel', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o nome do responsável por este orgão.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('responsavel_telefone', 'Telefone do resp.') !!}
                {!! Form::text('responsavel_telefone', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o telefone do responsável pelo orgão.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('responsavel_email', 'E-mail do resp.') !!}
                {!! Form::text('responsavel_email', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o e-mail do responsável pelo orgão (caso haja).</span>
            </div>
        </div>

    @endcomponent

    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
