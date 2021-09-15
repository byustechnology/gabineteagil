<!-- Escolha de etapas -->
{!! Form::open(['url' => route('ocorrencia.etapa.escolher', ['ocorrencia' => $ocorrencia]), 'method' => 'post']) !!}
<div class="modal fade" id="m-etapa" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Escolher uma etapa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('etapa', 'Escolha a etapa') !!}
                    {!! Form::select('etapa', [
                        '' => 'Por favor, selecione...'
                    ] + \ByusTechnology\Gabinete\Models\Etapa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                    <span class="form-text">Escolha uma etapa para alterar etapa atual da ocorrência indicada.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Escolher etapa', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}