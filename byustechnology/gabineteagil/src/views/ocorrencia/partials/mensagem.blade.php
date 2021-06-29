<!-- Mensagem -->
{!! Form::open(['url' => route('ocorrencia.mensagem.store', ['ocorrencia' => $ocorrencia]), 'method' => 'post', 'files' => 'true']) !!}
<div class="modal fade" id="m-ocorrencia-mensagem" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar mensagem</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem') !!}
                    {!! Form::textarea('mensagem', null, ['class' => 'form-control', 'rows' => 4]) !!}
                    <span class="form-text">Digite uma mensagem para ficar registrada nesta ocorrência.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('arquivo', 'Anexar arquivo', ['class' => 'd-block']) !!}
                    {!! Form::file('arquivo') !!}
                    <span class="form-text">Você pode anexar arquivos nas ocorrências. <strong class="text-danger">Os arquivos devem ter até 1MB</strong></span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Adicionar mensagem', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}