<div class="container-fluid">

    @component('ui::card')

        @slot('title')
            Informações da etapa
        @endslot

        <div class="form-group">
            {!! Form::label('codigo', 'Código da etapa *') !!}
            {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha um código para a etapa.</span>
        </div>
        <div class="form-group">
            {!! Form::label('titulo', 'Título da etapa *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha uma identificação para a etapa.</span>
        </div>

        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('ordem', 'Ordem') !!}
                {!! Form::number('ordem', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe a ordem desta etapa. <span class="text-success">Quanto menor este número, mais inicial será a etapa.</span></span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('cor', 'Cor (identificação)') !!}
                {!! Form::input('color', 'cor', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma cor para identificar a etapa. <span class="text-success">Se nenhuma cor for selecionada, será considerada a cor preta.</span></span>
            </div>
        </div>
    @endcomponent

    @component('ui::card')
        @slot('title')
            Ações da etapa
        @endslot

        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('conclui', 'Conclui ocorrências?') !!}
                {!! Form::select('conclui', [
                    0 => 'Não', 
                    1 => 'Sim'
                ], null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe se ao chegarmos nesta etapa, ela deve concluir uma ocorrência. Esta opção pode ser útil para concluir automaticamente as ocorrências que cheguem até esta etapa.</span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('cancela', 'Cancela ocorrências?') !!}
                {!! Form::select('cancela', [
                    0 => 'Não', 
                    1 => 'Sim'
                ], null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe se ao chegarmos nesta etapa, ela deve cancelar uma ocorrência. Esta opção, assim como a opção de concluir, pode ser útil para cancelar automaticamente as ocorrências que cheguem até esta etapa.</span>
            </div>
        </div>
    @endcomponent
    
    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
