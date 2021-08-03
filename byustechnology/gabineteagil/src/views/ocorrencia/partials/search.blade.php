<!-- Busca avançada -->
{!! Form::open(['url' => route('ocorrencia.index'), 'method' => 'get']) !!}
<div class="modal fade" id="m-search" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Busca avançada</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('keyword', 'Palavra-chave') !!}
                    {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe uma palavra-chave para buscar pelo recurso.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('field', 'Buscar em') !!}
                    {!! Form::select('field', [
                    'titulo' => 'Título',
                    'codigo' => 'Código',
                    'pessoa' => 'Pessoa',
                    'descricao' => 'Descrição da ocorrência'
                    ], null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe em qual campo você deseja fazer a sua busca.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo da ocorrência') !!}
                    {!! Form::select('tipo', [
                    '' => 'Não filtrar por tipo...',
                    ] + \ByusTechnology\Gabinete\Models\Ocorrencia::TIPOS, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Selecione o campo acima caso deseje filtrar ocorrências em uma etapa específica.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('etapa_id', 'Filtrar etapas') !!}
                    {!! Form::select('etapa_id', [
                    '' => 'Não filtrar por orgão responsável...',
                    ] + \ByusTechnology\Gabinete\Models\Etapa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                    <span class="form-text">Selecione o campo acima caso deseje filtrar ocorrências em uma etapa específica.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('orgao_id', 'Orgão responsável') !!}
                    {!! Form::select('orgao_id', [
                    '' => 'Não filtrar por orgão responsável...',
                    ] + \ByusTechnology\Gabinete\Models\OrgaoResponsavel::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                    <span class="form-text">Selecione o campo acima caso deseje filtrar as ocorrências por um determinado orgão responsável.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('assunto_id', 'Assuntos') !!}
                    {!! Form::select('assunto_id', [
                    '' => 'Não filtrar por assunto...',
                    ] + \ByusTechnology\Gabinete\Models\Assunto::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                    <span class="form-text">Selecione o campo acima caso deseje filtrar as ocorrências por assunto.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}