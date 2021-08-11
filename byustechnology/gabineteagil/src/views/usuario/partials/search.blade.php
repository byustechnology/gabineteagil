<!-- Busca avançada -->
{!! Form::open(['url' => route('usuario.index'), 'method' => 'get']) !!}
    <div class="modal fade" id="m-search" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Busca avançada</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('keyword', 'Palavra-chave') !!}
                        {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe uma palavra-chave para buscar pelo recurso.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('field', 'Buscar em') !!}
                        {!! Form::select('field', [
                            'name' => 'Nome do usuário', 
                            'email' => 'E-mail do usuário',     
                        ], null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe em qual campo você deseja fazer a sua busca.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}