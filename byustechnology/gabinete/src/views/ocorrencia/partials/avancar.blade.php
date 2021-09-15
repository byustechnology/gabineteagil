<!-- Avançar etapas -->
{!! Form::open(['url' => route('ocorrencia.etapa.avancar', ['ocorrencia' => $ocorrencia]), 'method' => 'post']) !!}
<div class="modal fade" id="m-avancar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Avançar uma etapa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <span>Tem certeza que deseja avançar uma etapa na ocorrência de {{ $ocorrencia->pessoa->titulo }}?</span>
                </div>

                @if ( empty($ocorrencia->protocolo))
                    <div class="form-group">
                        {!! Form::label('protocolo', 'Número do protocolo') !!}
                        {!! Form::text('protocolo', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Por favor, informe o número do protocolo referente a etapa antes de avançar.</span>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <span>Protocolo <strong>{{ $ocorrencia->protocolo }}</strong></span>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                {!! Form::submit('Avançar etapa', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}