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
            @php

                $mensagemWhatsapp = 'Olá ' . optional($ocorrencia->pessoa)->titulo . PHP_EOL . 'Sua solicitação ' . optional($ocorrencia->assunto)->titulo . ' já está no(a) ' . optional($ocorrencia->orgaoResponsavel)->titulo . PHP_EOL . PHP_EOL . 'No momento a etapa é: ' . optional($ocorrencia->etapa)->titulo . PHP_EOL . PHP_EOL . 'Vamos nos falando, ' . PHP_EOL . 'Atenciosamente';

                $vereadorGabinete = \ByusTechnology\Gabinete\Models\Usuario::where('type', 'vereador')->first();

                if ( ! empty($vereadorGabinete)) {
                    $mensagemWhatsapp .= PHP_EOL . $vereadorGabinete->name;
                }

            @endphp
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem da notificação') !!}
                    {!! Form::textarea('mensagem', $mensagemWhatsapp, ['class' => 'form-control']) !!}
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