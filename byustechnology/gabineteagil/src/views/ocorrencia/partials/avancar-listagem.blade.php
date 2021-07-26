<!-- Avançar etapas -->
{!! Form::open(['url' => '#', 'method' => 'post']) !!}
<div class="modal fade" id="m-avancar-listagem" tabindex="-1">
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
                    <span>Tem certeza que deseja avançar uma etapa na ocorrência? Para avançar, por favor, informe o número do protocolo.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('protocolo', 'Número do protocolo') !!}
                    {!! Form::text('protocolo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, informe o número do protocolo referente a etapa antes de avançar.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Avançar etapa', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script>
    $('#m-avancar-listagem').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var url = button.data('url')
        var modal = $(this)
        modal.parents('form').attr('action', url)
})
</script>