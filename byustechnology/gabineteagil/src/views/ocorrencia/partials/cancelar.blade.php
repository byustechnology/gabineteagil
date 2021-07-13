<!-- Cancelar -->
{!! Form::open(['url' => route('ocorrencia.cancelar', ['ocorrencia' => $ocorrencia]), 'method' => 'post']) !!}
<div class="modal fade" id="m-cancelar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar ocorrência</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja <strong class="text-danger">cancelar</strong> a ocorrência de {{ $ocorrencia->pessoa->titulo }}?</p>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="confirmacao" name="confirmacao">
                        <label class="custom-control-label text-danger" for="confirmacao">Sim, tenho certeza</label>
                        <span class="form-text">Marque o campo acima para verificarmos se você realmente tem certeza que deseja cancelar esta ocorrência.</span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('cancelada_observacao', 'Motivo do cancelamento') !!}
                    {!! Form::textarea('cancelada_observacao', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, informe o motivo referente ao cancelamento desta ocorrência.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Cancelar ocorrência', ['class' => 'btn btn-danger']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}