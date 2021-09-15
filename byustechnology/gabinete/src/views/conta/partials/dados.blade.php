{!! Form::model($usuario, ['url' => route('conta.update'), 'method' => 'patch']) !!}
    <div class="modal fade" id="m-dados" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar meus dados</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Nome completo') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o seu nome completo. Este nome será exibido nas telas da aplicação.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o seu e-mail. <span class="text-danger">Este e-mail será utilizado para realizar login no sistema. O e-mail deve ser único</span>.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Alterar dados', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}