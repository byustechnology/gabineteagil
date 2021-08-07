{!! Form::open(['url' => route('conta.update'), 'method' => 'patch']) !!}
    <div class="modal fade" id="m-senha" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar minha senha</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('password', 'Nova senha') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="form-text">Informe a sua nova senha. <span class="text-danger">A sua senha deve ter no mínimo 06 dígitos</span>.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirme a sua senha') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                        <span class="form-text">Informe a sua nova senha. <span class="text-danger">A sua senha deve ter no mínimo 06 dígitod</span>.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Alterar senha', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}