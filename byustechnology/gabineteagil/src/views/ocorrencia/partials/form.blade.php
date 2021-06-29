<div class="container-fluid">
    <div class="form-group">
        {!! Form::label('pessoa_id', 'Pessoa associada *') !!}
        {!! Form::select('pessoa_id', [
        '' => 'Por favor, selecione...',
        ] + \ByusTechnology\Gabinete\Models\Pessoa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
        <span class="form-text">Informe a pessoa que está associada a esta pessoa.</span>
    </div>
    <div class="row">
        <div class="col-lg form-group">
            {!! Form::label('assunto_id', 'Assunto *') !!}
            {!! Form::select('assunto_id', [
            '' => 'Por favor, selecione...',
            ] + \ByusTechnology\Gabinete\Models\Assunto::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe qual o assunto associado a esta ocorrência.</span>
        </div>
        <div class="col-lg form-group">
            {!! Form::label('etapa_id', 'Etapa *') !!}
            {!! Form::select('etapa_id', [
            '' => 'Por favor, selecione...',
            ] + \ByusTechnology\Gabinete\Models\Etapa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe qual o assunto associado a esta ocorrência.</span>
        </div>
        <div class="col-lg form-group">
            {!! Form::label('orgao_responsavel_id', 'Orgão responsável *') !!}
            {!! Form::select('orgao_responsavel_id', [
            '' => 'Por favor, selecione...',
            ] + \ByusTechnology\Gabinete\Models\OrgaoResponsavel::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe qual o orgão responsável associado a esta ocorrência.</span>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição da ocorrência *') !!}
        {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
        <span class="form-text">Informe uma descrição para esta ocorrência. De preferência a descrição deverá ser detalhada, afim de abranger e facilitar a aquisição das informações.</span>
    </div>

    <hr>
    <div class="form-footer text-right">
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    </div>

</div>