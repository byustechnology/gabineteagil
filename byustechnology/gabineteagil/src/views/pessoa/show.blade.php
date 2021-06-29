@extends('gabinete::layouts.main')
@section('title', $pessoa->titulo . ' - Pessoas')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">{{ $pessoa->titulo }} - Pessoas</h1>

@slot('actions')
<a href="{{ route('pessoa.edit', ['pessoa' => $pessoa]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-pessoa-show', $pessoa)])
@endslot
@endcomponent

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4">
            <h3 class="h3">{{ $pessoa->titulo }}</h3>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pessoa.contato.index', ['pessoa' => $pessoa]) }}">Contatos</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-8">
                    @component('gabinete::components.attribute', ['title' => 'Título'])
                    {{ $pessoa->titulo }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('gabinete::components.attribute', ['title' => 'Código'])
                    {{ $pessoa->codigo }}
                    @endcomponent
                </div>
            </div>

            @component('gabinete::components.attribute', ['title' => 'Descrição'])
            {{ $pessoa->descricao ?? 'Nenhuma descrição definida' }}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Adicionado em'])
                    {{ $pessoa->created_at->format('d/m/Y') }}, {{ $pessoa->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('gabinete::components.attribute', ['title' => 'Alterado em'])
                    {{ $pessoa->updated_at->format('d/m/Y') }}, {{ $pessoa->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>

@endsection