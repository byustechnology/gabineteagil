<!-- Mensagem -->
{!! Form::open(['url' => route('pessoa.store'), 'method' => 'post', 'files' => 'true']) !!}
<div class="modal fade" id="m-pessoa" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar pessoa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('titulo', 'Título da pessoa *') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Preencha uma identificação para a pessoa.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo da pessoa') !!}
                    {!! Form::select('tipo', [
                        '' => 'Por favor, selecione...'
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::TIPO, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, informe o tipo da pessoa. Ao informar o tipo da pessoa, os novos campos irão aparecer.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Cadastrar pessoa', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}