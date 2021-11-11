@extends('gabinete::layouts.main')
@section('title', $orgao->titulo . ' - Orgão responsável')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block my-3 mt-4 h3">{{ $orgao->titulo }} - Orgão responsável</h1>

        @slot('actions')
            <a href="{{ route('orgao.edit', ['orgao' => $orgao]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-orgao-show', $orgao)])
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
                        {{ $orgao->titulo }}
                    @endcomponent
                </div>
                <div class="col-lg-4">
                    @component('ui::attribute', ['title' => 'Código'])
                        {{ $orgao->codigo }}
                    @endcomponent
                </div>
            </div>

            @component('ui::attribute', ['title' => 'Descrição'])
                {{ $orgao->descricao ?? 'Nenhuma descrição definida' }}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Cor de identificação'])
                        <span class="badge py-1 px-3 shadow-sm" style="background-color: {{ $orgao->cor }}; color: {{ $orgao->cor_texto }}">{{ $orgao->cor }}</span></h1>
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Adicionado em'])
                        {{ $orgao->created_at->format('d/m/Y') }}, {{ $orgao->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Alterado em'])
                        {{ $orgao->updated_at->format('d/m/Y') }}, {{ $orgao->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

        @component('ui::card')
            @slot('title')
                Responsável
            @endslot

            <div class="row">
                <div class="col-lg-6">
                    @component('ui::attribute', ['title' => 'Responsável'])
                        {!! $orgao->responsavel ?? '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Telefone resp.'])
                        {!! $orgao->responsavel_telefone ?? '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'E-mail resp.'])
                        {!! $orgao->responsavel_email ? '<a href="mailto:{{ $orgao->responsavel_email }}">{{ $orgao->responsavel_email }}</a>'  : '<span class="text-muted">Não informado</span>' !!}
                    @endcomponent
                </div>
            </div>
        @endcomponent

    </div>

@endsection