<div class="container-fluid">

    @component('ui::card')
        @slot('title')
            Opções do relatório
        @endslot
        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('inicio', 'Data inicial') !!}
                {!! Form::date('inicio', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma data de início como referência para o relatório.</span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('termino', 'Data término') !!}
                {!! Form::date('termino', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma data de término como referência para o relatório.</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg form-group">
                {!! Form::label('orgao_id', 'Orgão responsável') !!}
                {!! Form::select('orgao_id', [
                '' => 'Não filtrar orgão responsável...',
                ] + \ByusTechnology\Gabinete\Models\OrgaoResponsavel::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe caso deseje filtrar o orgão responsável associado as ocorrências.</span>
            </div>
            <div class="col-lg form-group">
                {!! Form::label('etapa_id', 'Filtrar etapas') !!}
                {!! Form::select('etapa_id', [
                    '' => 'Não filtrar etapas...',
                ] + \ByusTechnology\Gabinete\Models\Etapa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Selecione o campo acima caso deseje filtrar ocorrências em uma etapa específica.</span>
            </div>
        </div>
    @endcomponent

    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-check-circle fa-fw mr-1"></i> Gerar relatório</button>
    @endcomponent
</div>