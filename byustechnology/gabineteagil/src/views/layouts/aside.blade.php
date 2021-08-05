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
            <li class="divider">Ocorrências</li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index') }}">Todas as ocorrências</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.create') }}">Nova ocorrência</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('ocorrencia.index', ['atrasadas' => 1]) }}">Ocorrências em atraso</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><strike>Ocorrências por assunto</strike></a></li>
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