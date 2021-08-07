<!-- Mensagem -->
{!! Form::open(['url' => route('assunto.store'), 'method' => 'post', 'files' => 'true']) !!}
<div class="modal fade" id="m-assunto" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar assunto</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('codigo', 'Código do assunto *') !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Preencha um código para o assunto. <span class="text-danger">Este campo deve ser único. Deixe em branco para que o sistema gere um código sozinho</span>.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('titulo', 'Título do assunto *') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Preencha uma identificação para o assunto.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('cor', 'Cor (identificação)') !!}
                    {!! Form::input('color', 'cor', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe uma cor para identificar o assunto. <span class="text-success">Se nenhuma cor for selecionada, será considerada a cor preta.</span></span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Cadastrar assunto', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script>
    $(function() {
        $('#m-assunto').parents('form').submit(function(event) {
            event.preventDefault()

            const params = $(this).serializeArray().reduce((arr, item) => {
                arr[item.name] = item.value
                return arr
            }, {})

            $.ajax('{{ route('assunto.store') }}', {
                type: 'POST', 
                data: params, 
                dataType: 'json'
            })
            .done(function(data) {
                console.log(data)
                $('#assunto_id').append(new Option(data.assunto.titulo, data.assunto.id))
                $('#assunto_id').val(data.assunto.id)
                $('#m-assunto').modal('hide')
                $('#m-assunto').parents('form').trigger('reset')
            })
            .fail(function(data) {
                var errors = '';

                $.each(JSON.parse(data.responseText).errors, function(key, value) {
                    errors = errors + value[0] + "\n"
                })

                alert(errors)
            });
        })
    });
</script>