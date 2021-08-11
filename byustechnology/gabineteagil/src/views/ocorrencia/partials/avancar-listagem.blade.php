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
                <div class="protocolo-group form-group">
                    {!! Form::label('protocolo', 'Número do protocolo') !!}
                    {!! Form::text('protocolo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, informe o número do protocolo referente a etapa antes de avançar.</span>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="concluir" name="concluir">
                        <label class="custom-control-label text-danger" for="concluir">Desejo concluir a ocorrência</label>
                        <span class="form-text">Marque o campo acima caso você deseje que a ocorrência seja finalizada quando for para a próxima etapa.</span>
                    </div>
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
        var protocolo = button.data('protocolo')
        var modal = $(this)
        modal.parents('form').attr('action', url)


        modal.find('#protocolo').val(protocolo)
        modal.find('.protocolo-group').hide()
        modal.find('#protocolo').attr('disabled', true)

        if (protocolo == '') {
            modal.find('#protocolo').val('')
            modal.find('.protocolo-group').show()
            modal.find('#protocolo').attr('disabled', false)
        }
})
</script>