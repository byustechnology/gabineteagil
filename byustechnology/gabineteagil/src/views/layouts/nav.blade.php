<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="{{ route('gabinete.dashboard') }}">{{ config('gabinete.title') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="{{ route('gabinete.dashboard') }}"><i class="fas fa-tachometer-alt fa-fw mr-1"></i> Dashboard</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown"><i class="fas fa-clipboard-list fa-fw mr-1"></i> Ocorrências</a>
                <div class="dropdown-menu shadow-lg">
                    {!! Form::open(['url' => config('gabinete.path') . '/ocorrencia', 'method' => 'get', 'class' => 'px-4 pt-1 pb-2']) !!}
                    <input name="s" type="text" class="form-control form-control-sm" placeholder="Buscar...">
                    {!! Form::close() !!}
                    <a class="dropdown-item" href="{{ route('ocorrencia.index') }}">Listar ocorrências</a>
                    <a class="dropdown-item" href="{{ route('ocorrencia.create') }}">Cadastrar ocorrência</a>
                    <h6 class="dropdown-header">Relatórios</h6>
                    <a class="dropdown-item" href="#">Ocorrências por assunto</a>
                    <a class="dropdown-item" href="#">Ocorrências por pessoa</a>
                    <a class="dropdown-item" href="#">Ocorrências por região</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown"><i class="fas fa-users fa-fw mr-1"></i> Pessoas</a>
                <div class="dropdown-menu shadow-lg">
                    {!! Form::open(['url' => config('gabinete.path') . '/pessoa', 'method' => 'get', 'class' => 'px-4 pt-1 pb-2']) !!}
                    <input name="s" type="text" class="form-control form-control-sm" placeholder="Buscar...">
                    {!! Form::close() !!}
                    <a class="dropdown-item" href="{{ route('pessoa.index') }}">Listar pessoas</a>
                    <a class="dropdown-item" href="{{ route('pessoa.create') }}">Cadastrar pessoas</a>
                </div>
            </li>
            <!--<li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown">Etapas</a>
                <div class="dropdown-menu shadow-lg">
                    {!! Form::open(['url' => config('gabinete.path') . '/etapa', 'method' => 'get', 'class' => 'px-4 pt-3 pb-0']) !!}
                        <div class="form-group">
                            <input name="s" type="text" class="form-control form-control-sm" placeholder="Buscar...">
                        </div>
                    {!! Form::close() !!}
                    <a class="dropdown-item" href="{{ route('etapa.index') }}">Listar etapas</a>
                    <a class="dropdown-item" href="{{ route('etapa.create') }}">Cadastrar etapa</a>
                </div>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown"><i class="fas fa-file-alt fa-fw mr-1"></i> Cadastros</a>

                <div class="dropdown-menu shadow-lg">
                    <h6 class="dropdown-header">Orgãos responsáveis</h6>
                    {!! Form::open(['url' => config('gabinete.path') . '/orgao', 'method' => 'get', 'class' => 'px-4 pt-1 pb-2']) !!}
                    <input name="s" type="text" class="form-control form-control-sm" placeholder="Buscar...">
                    {!! Form::close() !!}
                    <a class="dropdown-item" href="{{ route('orgao.index') }}">Listar orgãos responsáveis</a>
                    <a class="dropdown-item" href="{{ route('orgao.create') }}">Cadastrar orgão responsável</a>
                    <h6 class="dropdown-header mt-2">Assuntos</h6>
                    {!! Form::open(['url' => config('gabinete.path') . '/assunto', 'method' => 'get', 'class' => 'px-4 pt-1 pb-2']) !!}
                    <input name="s" type="text" class="form-control form-control-sm" placeholder="Buscar...">
                    {!! Form::close() !!}
                    <a class="dropdown-item" href="{{ route('assunto.index') }}">Listar assuntos</a>
                    <a class="dropdown-item" href="{{ route('assunto.create') }}">Cadastrar assunto</a>
                </div>
            </li>
        </ul>

        <!--
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        -->
    </div>
</nav>