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

        @component('gabinete::components.card')
            @slot('title')
                Informações da agenda
            @endslot
            
            @component('gabinete::components.attribute', ['title' => 'Título'])
                {{ $agenda->titulo }}
            @endcomponent

            @component('gabinete::components.attribute', ['title' => 'Descrição'])
                {{ $agenda->descricao ?? 'Nenhuma descrição definida' }}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Início em'])
                        {{ $agenda->inicio_em->format('d/m/Y') }}, {{ $agenda->inicio_em->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Término em'])
                        {{ $agenda->termino_em->format('d/m/Y') }}, {{ $agenda->termino_em->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Associado para'])
                        {{ optional($agenda->user)->name }}
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Adicionado em'])
                        {{ $agenda->created_at->format('d/m/Y') }}, {{ $agenda->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Alterado em'])
                        {{ $agenda->updated_at->format('d/m/Y') }}, {{ $agenda->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

    </div>
    
@endsection