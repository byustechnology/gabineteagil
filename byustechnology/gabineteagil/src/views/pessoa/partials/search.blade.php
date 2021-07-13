<!-- Busca avançada -->
{!! Form::open(['url' => route('pessoa.index'), 'method' => 'get']) !!}
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
                            'titulo' => 'Título', 
                            'codigo' => 'Código',
                            'documento' => 'Documento'
                        ], null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe em qual campo você deseja fazer a sua busca.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            {!! Form::label('tipo', 'Tipo da pessoa') !!}
                            {!! Form::select('tipo', [
                                '' => 'Todos os tipos...', 
                            ] + \ByusTechnology\Gabinete\Models\Pessoa::TIPO, null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe caso deseje filtrar por tipo de pessoa.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}