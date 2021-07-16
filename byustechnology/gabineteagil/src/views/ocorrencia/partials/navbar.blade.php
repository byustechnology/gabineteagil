<div class="row">
    <div class="col-lg-9">
        <nav class="navbar navbar-expand-lg bg-white navbar-light border rounded font-weight-bold shadow-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ocorrenciaNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="ocorrenciaNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.show', ['ocorrencia' => $ocorrencia]) }}">Geral</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="mensagensDropdown" data-toggle="dropdown">Nova ação</span></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-ocorrencia-mensagem"><i class="far fa-comment-dots fa-fw mr-1"></i> Nova mensagem</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-ocorrencia-arquivo"><i class="fas fa-paperclip fa-fw mr-1"></i> Novo arquivo</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-avancar"><i class="fas fa-arrow-right fa-fw mr-1"></i> Avançar etapa</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-etapa"><i class="fas fa-list-ol fa-fw mr-1"></i> Escolher uma etapa</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-concluir"><i class="far fa-check-circle fa-fw mr-1"></i> Concluir ocorrência</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-cancelar"><i class="far fa-times-circle fa-fw mr-1"></i> Cancelar ocorrência</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]) }}">Mensagens <span class="badge badge-secondary py-1 px-2 ml-1">{{ $ocorrencia->mensagens_count }}</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.arquivo.index', ['ocorrencia' => $ocorrencia]) }}">Arquivos <span class="badge badge-secondary py-1 px-2 ml-1">{{ $ocorrencia->arquivos_count }}</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="col-lg-3">
        <div class="attribute my-0 animate__animated animate__flash animate__infinite shadow-sm" style="background-color: {{ $ocorrencia->etapa->cor }}">
            <strong style="color: {{ $ocorrencia->etapa->cor_texto }}" class="d-block">Etapa</strong>
            <span style="color: {{ $ocorrencia->etapa->cor_texto }}" class="d-block">{{ $ocorrencia->etapa->titulo }}</span>
        </div>
    </div>
</div>