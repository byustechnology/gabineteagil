<!-- Concluir -->
{!! Form::open(['url' => route('ocorrencia.concluir', ['ocorrencia' => $ocorrencia]), 'method' => 'post']) !!}
<div class="modal fade" id="m-concluir" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Finalizar conclusão</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Tem certeza que deseja concluir a sua ocorrência?</p>

                    <div class="form-group">
                        {!! Form::label('concluida_em', 'Data de conclusão') !!}
                        {!! Form::date('concluida_em', today(), ['class' => 'form-control']) !!}
                        <span class="form-text">Informe uma data referente a conclusão da ocorrência. <span class="text-success">Caso nenhuma data seja informada, a data atual será considerada.</span></span>
                    </div>

                    <div class="form-group">
                        {!! Form::label('concluida_observacao', 'Observações da conclusão') !!}
                        {!! Form::textarea('concluida_observacao', null, ['class' => 'form-control', 'rows' => 4]) !!}
                        <span class="form-text">Informe uma observação referente a conclusão da ocorrência. <span class="text-success">Este campo é opcional. Preenche-lo irá ajudar no entendimento de cada ocorrência</span></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Concluir ocorrência', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}