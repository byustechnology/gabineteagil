<!-- Enviar notificação -->
{!! Form::open(['url' => route('ocorrencia.notificar.whatsapp', ['ocorrencia' => $ocorrencia]), 'method' => 'post', 'target' => '_blank']) !!}
<div class="modal fade" id="m-notificar-whats" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Enviar notificação via WhatsApp</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem da notificação') !!}
                    {!! Form::textarea('mensagem', 'Olá ' . optional($ocorrencia->pessoa)->titulo . ', a sua ocorrência ' . $ocorrencia->id . ' foi atualizada e encontra-se na etapa: ' . $ocorrencia->etapa->titulo . '. Para maiores informações, entre em contato conosco.', ['class' => 'form-control']) !!}
                    <span class="form-text">Preencha a mensagem que será enviada para o WhatsApp.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('numero', 'Número do Whatsapp') !!}
                    {!! Form::text('numero', $ocorrencia->pessoa_whatsapp, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe acima qual o número será notificado pelo WhatsApp.</span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Enviar mensagem', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}