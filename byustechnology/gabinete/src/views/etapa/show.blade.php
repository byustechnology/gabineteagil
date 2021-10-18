@extends('gabinete::layouts.main')
@section('title', $etapa->titulo . ' - Etapas')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">{{ $etapa->titulo }} - Etapas</h1>

        @slot('actions')
            <a href="{{ route('etapa.edit', ['etapa' => $etapa]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-etapa-show', $etapa)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            @slot('title')
                Informações do orgão responsável
            @endslot
            
            <div class="row">
                <div class="col-lg-8">
                    @component('ui::attribute', ['title' => 'Título'])
                        {{ $etapa->titulo }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'Código'])
                        {{ $etapa->codigo }}
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'Ordem'])
                        {{ $etapa->ordem ?? 'Nenhuma ordem definida' }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'Concluí ocorrência?'])
                        {{ $etapa->conclui ? 'Sim' : 'Não' }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'Cancela ocorrência?'])
                        {{ $etapa->cancela ? 'Sim' : 'Não' }}
                    @endcomponent
                </div>
            </div>

            

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Cor de identificação'])
                        <span class="badge py-1 px-3 shadow-sm" style="background-color: {{ $etapa->cor }}; color: {{ $etapa->cor_texto }}">{{ $etapa->cor }}</span></h1>
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Adicionado em'])
                        {{ $etapa->created_at->format('d/m/Y') }}, {{ $etapa->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Alterado em'])
                        {{ $etapa->updated_at->format('d/m/Y') }}, {{ $etapa->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

    </div>
    
@endsection