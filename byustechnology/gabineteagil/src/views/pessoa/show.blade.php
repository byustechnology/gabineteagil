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
            @component('gabinete::components.card')
                @slot('title')
                    <h2 class="h6 d-block mb-0">Ações</h2>
                @endslot
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ocorrencia.index', ['pessoa_id' => $pessoa]) }}">Ocorrências</a>
                        <a class="nav-link" href="{{ route('pessoa.contato.index', ['pessoa' => $pessoa]) }}">Contatos</a>
                    </li>
                </ul>
            @endcomponent

            @component('gabinete::components.card')
                @slot('title')
                    <h2 class="h6 d-block mb-0">Endereço</h2>
                @endslot

                @component('gabinete::components.attribute', ['title' => 'Logradouro'])
                    {{ $pessoa->logradouro }}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Número'])
                    {{ $pessoa->numero }}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Complemento'])
                    {!! $pessoa->complemento ?? '<span class="text-muted">Nenhum</span>' !!}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Cidade/Estado'])
                    {{ $pessoa->cidade }}/{{ $pessoa->estado}}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'CEP'])
                    {{ $pessoa->cep }}
                @endcomponent

            @endcomponent
        </div>
        <div class="col-lg-8">
            @component('gabinete::components.card')
                @slot('title')
                    <h2 class="h6 d-block mb-0">Informações da pessoa</h2>
                @endslot
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
            @endcomponent

            <!-- Pessoa física -->
            @if ($pessoa->tipo == 'f')
                @component('gabinete::components.card')
                    @slot('title')
                    <h2 class="h6 d-block mb-0">Pessoa física</h2>
                    @endslot

                    @component('gabinete::components.attribute', ['title' => 'Documento (CPF)'])
                    {{ $pessoa->documento }}
                    @endcomponent

                    <div class="row">
                        <div class="col-lg">
                            @component('gabinete::components.attribute', ['title' => 'Gênero'])
                            {!! $pessoa->genero ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg">
                            @component('gabinete::components.attribute', ['title' => 'Nascido em'])
                            {!! ! empty($pessoa->nascido_em) ? $pessoa->nascido_em->format('d/m/Y') : '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg">
                            @component('gabinete::components.attribute', ['title' => 'Escolaridade'])
                            {!! $pessoa->escolaridade ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                    </div>

                    @component('gabinete::components.attribute', ['title' => 'Profissão'])
                    {!! $pessoa->profissao ?? '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent

                    <div class="row">
                        <div class="col-lg-4">
                            @component('gabinete::components.attribute', ['title' => 'Estado civil'])
                            {!! $pessoa->estado_civil ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg-4">
                            @component('gabinete::components.attribute', ['title' => 'Nome do cônjugue'])
                            {!! $pessoa->profissao ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg-4">
                            @component('gabinete::components.attribute', ['title' => 'Data de nascimento do cônjugue'])
                            {!! ! empty($pessoa->conjugue_nascido_em) ? $pessoa->conjugue_nascido_em->format('d/m/Y') : '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            @component('gabinete::components.attribute', ['title' => 'Qtde. de filhos'])
                            {!! $pessoa->filhos > 0 ? $pessoa->filhos : '<span class="text-muted">Não há</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg-3">
                            @component('gabinete::components.attribute', ['title' => 'Renda familiar'])
                            {!! $pessoa->renda > 0 ? $pessoa->renda : '<span class="text-muted">Não há</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg-3">
                            @component('gabinete::components.attribute', ['title' => 'Tipo da residência'])
                            {!! $pessoa->residencia_tipo ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg-3">
                            @component('gabinete::components.attribute', ['title' => 'Tipo da moradia'])
                            {!! $pessoa->moradia_tipo ?? '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                    </div>
                @endcomponent
            @endif

            <!-- Pessoa jurídica -->
            @if ($pessoa->tipo == 'j')
                @component('gabinete::components.card')
                    @slot('title')
                    <h2 class="h6 d-block mb-0">Pessoa jurídica</h2>
                    @endslot

                    @component('gabinete::components.attribute', ['title' => 'Documento (CNPJ)'])
                    {{ $pessoa->documento }}
                    @endcomponent

                    @component('gabinete::components.attribute', ['title' => 'Ramo de atuação'])
                    {!! $pessoa->ramo_atuacao ?? '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent

                    <div class="row">
                        <div class="col-lg">
                            @component('gabinete::components.attribute', ['title' => 'Fundada em'])
                            {!! ! empty($pessoa->fundada_em) ? $pessoa->fundada_em->format('d/m/Y') : '<span class="text-muted">Não informado</span>' !!}
                            @endcomponent
                        </div>
                        <div class="col-lg">
                        @component('gabinete::components.attribute', ['title' => 'Qtde. de colaboradores'])
                        {!! $pessoa->colaboradores_quantidade ?? '<span class="text-muted">Não informado</span>' !!}
                        @endcomponent
                        </div>
                    </div>

                @endcomponent
            @endif

            @component('gabinete::components.card')
                @slot('title')
                <h2 class="h6 d-block mb-0">Informações adicionais</h2>
                @endslot

                @component('gabinete::components.attribute', ['title' => 'Influência'])
                {!! $pessoa->influencia ? \ByusTechnology\Gabinete\Models\Pessoa::INFLUENCIA[$pessoa->influencia] : '<span class="text-muted">Não informado</span>' !!}
                @endcomponent

                @component('gabinete::components.attribute', ['title' => 'Observações'])
                {!! $pessoa->observacao ?? '<span class="text-muted">Não informado</span>' !!}
                @endcomponent
            @endcomponent
        </div>
    </div>
</div>

@endsection