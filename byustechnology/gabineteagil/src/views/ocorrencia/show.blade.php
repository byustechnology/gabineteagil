@extends('gabinete::layouts.main')
@section('title', $ocorrencia->titulo . ' - Ocorrências')
@section('content')

@component('gabinete::layouts.title')

<h1 class="d-block my-3 mt-4 h3">{{ $ocorrencia->titulo }} - Ocorrências</h1>

@slot('actions')
<a href="{{ route('ocorrencia.edit', ['ocorrencia' => $ocorrencia]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
@endslot

@slot('breadcrumbs')
@include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-show', $ocorrencia)])
@endslot
@endcomponent

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border rounded font-weight-bolder">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ocorrenciaNav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="ocorrenciaNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#">Geral</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="mensagensDropdown" data-toggle="dropdown">Mensagens <span class="badge badge-warning">{{ $ocorrencia->mensagens_count }}</span></a>
                            <div class="dropdown-menu" aria-labelledby="mensagensDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-ocorrencia-mensagem"><i class="fas fa-plus-square fa-fw mr-1"></i> Nova mensagem</a>
                                <a class="dropdown-item" href="{{ route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]) }}"><i class="fas fa-comment fa-fw mr-1"></i> Ver históricos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="arquivosDropdown" data-toggle="dropdown">Arquivos <span class="badge badge-warning">{{ $ocorrencia->arquivos_count }}</span></a>
                            <div class="dropdown-menu" aria-labelledby="arquivosDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m-ocorrencia-arquivo"><i class="fas fa-plus-square fa-fw mr-1"></i> Novo arquivo</a>
                                <a class="dropdown-item" href="{{ route('ocorrencia.mensagem.index', ['ocorrencia' => $ocorrencia]) }}"><i class="fas fa-comment fa-fw mr-1"></i> Ver arquivos</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-lg-3">
            <div class="attribute my-0 animate__animated animate__flash animate__infinite" style="background-color: {{ $ocorrencia->etapa->cor }}">
                <strong style="color: {{ $ocorrencia->etapa->cor_texto }}" class="d-block">Etapa</strong>
                <span style="color: {{ $ocorrencia->etapa->cor_texto }}" class="d-block">{{ $ocorrencia->etapa->titulo }}</span>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            @component('gabinete::components.card')
                @slot('title')
                    <h2 class="h6 d-block mb-0">Detalhes da ocorrência</h2>
                @endslot

                @component('gabinete::components.attribute', ['title' => 'Pessoa associada'])
                    <a href="{{ url($ocorrencia->pessoa->path()) }}">{{ $ocorrencia->pessoa->titulo }}</a>
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Descrição da ocorrência'])
                    {{ $ocorrencia->descricao }}
                @endcomponent
                
                @component('gabinete::components.attribute', ['title' => 'Assunto'])
                    {{ $ocorrencia->assunto->titulo }}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Adicionado em'])
                    {{ $ocorrencia->created_at->format('d/m/Y') }}, {{ $ocorrencia->created_at->diffForHumans() }}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Alterado em'])
                    {{ $ocorrencia->updated_at->format('d/m/Y') }}, {{ $ocorrencia->updated_at->diffForHumans() }}
                @endcomponent
            @endcomponent
        </div>
        <div class="col-lg">
            @component('gabinete::components.card')
                @slot('title')
                    <h2 class="h6 d-block mb-0">Últimas mensagens</h2>
                @endslot

                @component('gabinete::components.attribute', ['title' => 'Pessoa associada'])
                    <a href="{{ url($ocorrencia->pessoa->path()) }}">{{ $ocorrencia->pessoa->titulo }}</a>
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Descrição da ocorrência'])
                    {{ $ocorrencia->descricao }}
                @endcomponent
                
            @endcomponent
        </div>
    </div>
    
    
</div>

@include('gabinete::ocorrencia.partials.mensagem')
@include('gabinete::ocorrencia.partials.arquivo')

@endsection