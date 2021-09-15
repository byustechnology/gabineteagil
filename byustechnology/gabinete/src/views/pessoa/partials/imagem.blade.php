<!-- Imagem de profile -->
{!! Form::open(['url' => route('pessoa.imagem.store', ['pessoa' => $pessoa]), 'method' => 'post', 'files' => 'true']) !!}
    <div class="modal fade" id="m-imagem" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Imagem de profile</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if ( ! empty($pessoa->imagem))
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle fa-fw mr-2"></i> {{ $pessoa->titulo }} já possui uma imagem de perfial associada. Se desejar, você pode <a href="#" onclick="event.preventDefault(); document.getElementById('m-imagem-delete-form').submit();">remover a imagem de perfil</a> associada.
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('imagem', 'Imagem de perfil', ['class' => 'd-block']) !!}
                        {!! Form::file('imagem', null, ['class' => 'd-block']) !!}
                        <span class="form-text">Escolha uma imagem para esta pessoa. <span class="text-danger">As imagens devem ter no máximo 500 pixels de altura por 500 pixels de largura e não devem ultrapassar o tamanho de 1 MB. Formatos aceitos: PNG, JPG e JPEG.</span></span>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Adicionar imagem', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}

{!! Form::open(['url' => route('pessoa.imagem.destroy', ['pessoa' => $pessoa]), 'method' => 'delete', 'id' => 'm-imagem-delete-form']) !!}

{!! Form::close() !!}