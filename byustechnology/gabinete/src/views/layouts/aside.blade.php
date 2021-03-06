<aside class="sidebar bg-warning d-none d-md-block" id="mainNavigation">
    <div class="p-4">
        <div class="sidebar-logo my-3 d-none d-md-block">
            <a href="{{ route('gabinete.dashboard') }}"><img src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo {{ config('app.name') }}" width="128"></a>
        </div>

        {!! Form::open(['url' => route('ocorrencia.index'), 'method' => 'get', 'class' => 'mb-4']) !!}
            {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Buscar ocorrência...']) !!}
            {!! Form::hidden('field', 'pessoa') !!}
        {!! Form::close() !!}

        <ul class="navbar-nav">

            @if (auth()->user()->type == 'root')
                <li class="divider">Administração do App</li>
                <li class="nav-item"><a class="nav-link" href="{{ route('prefeitura.index') }}">Prefeituras</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usuario.index') }}">Usuários</a></li>
            @endif

            @if (auth()->user()->type == 'admin')
                <li class="divider">Administração</li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usuario.index') }}">Usuários</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('configuracao.index') }}">Configurações</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('etapa.index') }}">Etapas</a></li>
            @endif

            @if (auth()->user()->type != 'root')
            <li class="divider">Ocorrências</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.create') }}">Nova ocorrência</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index', ['abertas' => 1]) }}">Todas as ocorrências</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index', ['concluidas' => 1]) }}">Ocorrências em concluídas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index', ['canceladas' => 1]) }}">Ocorrências em canceladas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index', ['atrasadas' => 1]) }}">Ocorrências em atraso</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.relatorio.por-assunto') }}">Ocorrências por assunto</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><strike>Ocorrências por pessoa</strike></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><strike>Ocorrências por região</strike></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><strike>Visão geral</strike></a></li>
            <li class="divider">Pessoas</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index') }}">Todas as pessoas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.create') }}">Nova pessoa</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index', ['tipo' => 'f']) }}">Pessoas físicas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index', ['tipo' => 'j']) }}">Pessoas jurídicas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index', ['comOcorrenciasAtrasadas' => true]) }}">Com ocorrências em atraso</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('pessoa.index', ['aniversariantes' => true]) }}">Aniversariantes</a></li>
            <li class="divider">Agenda</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('agenda.index') }}">Ver agenda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('agenda.create') }}">Novo compromisso</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('agenda.index', ['visualizacao' => 'listWeek']) }}">Compromissos programados</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('agenda.index', ['visualizacao' => 'dayGridWeek']) }}">Compromissos da semana</a></li>
            <li class="divider">Mapa</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('mapa.index') }}">Mapa de ocorrências</a></li>
            <li class="divider">Gestão do aplicativo</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.tipo.index') }}">Tipos de ocorrências</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('orgao.index') }}">Orgãos responsáveis</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('orgao.create') }}">Adicionar orgão responsável</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assunto.index') }}">Assuntos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assunto.create') }}">Adicionar assunto</a></li>
            @endif
            <li class="divider">Minha conta</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('conta.index') }}">Meus dados</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('conta.index', ['dados' => 1]) }}">Alterar dados</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('conta.index', ['senha' => 1]) }}">Alterar senha</a></li>
            <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
        </ul>
    </div>
</aside>