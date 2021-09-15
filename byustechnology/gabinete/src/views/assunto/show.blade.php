@extends('gabinete::layouts.main')
@section('title', $assunto->titulo . ' - Assuntos')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block my-3 mt-4 h3">{{ $assunto->titulo }} - Assuntos</h1>

        @slot('actions')
            <a href="{{ route('assunto.edit', ['assunto' => $assunto]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-assunto-show', $assunto)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-8">
                @component('ui::attribute', ['title' => 'Título'])
                    {{ $assunto->titulo }}
                @endcomponent
            </div>
            <div class="col-lg-4">
                @component('ui::attribute', ['title' => 'Código'])
                    {{ $assunto->codigo }}
                @endcomponent
            </div>
        </div>

        @component('ui::attribute', ['title' => 'Descrição'])
            {{ $assunto->descricao ?? 'Nenhuma descrição definida' }}
        @endcomponent

        <div class="row">
            <div class="col-lg">
                @component('ui::attribute', ['title' => 'Cor de identificação'])
                    <span class="badge py-1 px-3 shadow-sm" style="background-color: {{ $assunto->cor }}; color: {{ $assunto->cor_texto }}">{{ $assunto->cor }}</span></h1>
                @endcomponent
            </div>
            <div class="col-lg">
                @component('ui::attribute', ['title' => 'Adicionado em'])
                    {{ $assunto->created_at->format('d/m/Y') }}, {{ $assunto->created_at->diffForHumans() }}
                @endcomponent
            </div>
            <div class="col-lg">
                @component('ui::attribute', ['title' => 'Alterado em'])
                    {{ $assunto->updated_at->format('d/m/Y') }}, {{ $assunto->updated_at->diffForHumans() }}
                @endcomponent
            </div>
        </div>

    </div>
    
@endsection