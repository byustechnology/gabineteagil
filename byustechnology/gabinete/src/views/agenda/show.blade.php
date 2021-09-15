@extends('gabinete::layouts.main')
@section('title', $agenda->titulo . ' - Agendas')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">{{ $agenda->titulo }} - Agendas</h1>

        @slot('actions')
            <a href="{{ route('agenda.edit', ['agenda' => $agenda]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-agenda-show', $agenda)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            @slot('title')
                Informações da agenda
            @endslot
            
            @component('ui::attribute', ['title' => 'Título'])
                {{ $agenda->titulo }}
            @endcomponent

            @component('ui::attribute', ['title' => 'Descrição'])
                {{ $agenda->descricao ?? 'Nenhuma descrição definida' }}
            @endcomponent

            @component('ui::attribute', ['title' => 'Orgão responsável'])
                {!! optional($agenda->orgaoResponsavel)->titulo ?? '<span class="text-muted">Nenhuma orgão responsável associado</span>' !!}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Início em'])
                        {{ $agenda->inicio_em->format('d/m/Y') }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Horário de início'])
                        {{ $agenda->inicio_em->format('H:i') }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Término em'])
                        {{ $agenda->termino_em->format('d/m/Y') }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Horário de término'])
                        {{ $agenda->termino_em->format('H:i') }}
                    @endcomponent
                </div>
            </div>

            @component('ui::attribute', ['title' => 'Associado para'])
                {{ optional($agenda->user)->name }}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Adicionado em'])
                        {{ $agenda->created_at->format('d/m/Y') }}, {{ $agenda->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Alterado em'])
                        {{ $agenda->updated_at->format('d/m/Y') }}, {{ $agenda->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

        @component('ui::card')
            @slot('title')
                <h2 class="h6 d-block mb-0">Endereço do agendamento</h2>
            @endslot

            @component('ui::attribute', ['title' => 'Logradouro'])
                {{ $agenda->logradouro }}
            @endcomponent

            @component('ui::attribute', ['title' => 'Número'])
                {{ $agenda->numero }}
            @endcomponent

            @component('ui::attribute', ['title' => 'Complemento'])
                {!! $agenda->complemento ?? '<span class="text-muted">Nenhum</span>' !!}
            @endcomponent

            @component('ui::attribute', ['title' => 'Cidade/Estado'])
                {{ $agenda->cidade }}/{{ $agenda->estado}}
            @endcomponent

            @component('ui::attribute', ['title' => 'CEP'])
                {{ $agenda->cep }}
            @endcomponent

        @endcomponent

    </div>
    
@endsection