<aside class="sidebar bg-warning" id="collapseSidebar">
    <div class="p-4">
        <div class="sidebar-logo my-3">
            <a href="{{ route('gabinete.dashboard') }}"><img src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo {{ config('app.name') }}" width="128"></a>
        </div>

        {!! Form::open(['url' => config('gabinete.path') . '/ocorrencia', 'method' => 'get', 'class' => 'mb-4']) !!}
            <input name="s" type="text" class="form-control" placeholder="Buscar ocorrência">
        {!! Form::close() !!}

        <ul class="navbar-nav">
            <li class="divider">Ocorrências</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index') }}">Todas as ocorrências</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.create') }}">Nova ocorrência</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ocorrências por assunto</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ocorrências por pessoa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ocorrências por região</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Visão geral</a></li>
            <li class="divider">Pessoas</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index') }}">Todas as pessoas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.create') }}">Nova pessoa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pessoas físicas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pessoas jurídicas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Com ocorrências em atraso</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Aniversariantes</a></li>
            <li class="divider">Mapa</li>
            <li class="nav-item"><a class="nav-link" href="#">Mapa de ocorrências</a></li>
            <li class="divider">Gestão do aplicativo</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('orgao.index') }}">Orgãos responsáveis</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('orgao.create') }}">Adicionar orgão responsável</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assunto.index') }}">Assuntos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assunto.create') }}">Adicionar assunto</a></li>
            <li class="divider">Minha conta</li>
            <li class="nav-item"><a class="nav-link" href="#">Meus dados</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Alterar senha</a></li>
            <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
        </ul>
    </div>
</aside>