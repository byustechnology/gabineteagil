@extends('gabinete::layouts.main')
@section('title', $tipo->titulo . ' - Tipos de ocorrência')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block my-3 mt-4 h3">{{ $tipo->titulo }} - Tipos de ocorrência</h1>

        @slot('actions')
            <a href="{{ route('ocorrencia.tipo.edit', ['tipo' => $tipo]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-ocorrencia-tipo-show', $tipo)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            @slot('title')
                Informações do orgão responsável
            @endslot

            @component('ui::attribute', ['title' => 'Título'])
                {{ $tipo->titulo }}
            @endcomponent

            @component('ui::attribute', ['title' => 'Descrição'])
                {{ $tipo->descricao ?? 'Nenhuma descrição definida' }}
            @endcomponent

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Adicionado em'])
                        {{ $tipo->created_at->format('d/m/Y') }}, {{ $tipo->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Alterado em'])
                        {{ $tipo->updated_at->format('d/m/Y') }}, {{ $tipo->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

        @component('ui::card')
            @slot('title')
                Template
            @endslot

            @php
                $ocorrenciaTeste = \ByusTechnology\Gabinete\Models\Ocorrencia::first()
            @endphp

            @if ( ! request()->has('preview') and ! empty($ocorrenciaTeste))
            <a href="{{ url()->current() . '?preview=true' }}" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" title="Visualiza como o template ficará em uma ocorrência">Visualizar preview</a>
            @endif

            @if (request()->has('preview'))
                <a href="{{ url()->current() }}" class="btn btn-sm btn-primary mb-3" data-toggle="tooltip" title="Remove o preview do template">Remover preview</a>
                @php
                    $parser = new \ByusTechnology\Gabinete\Actions\FormatarTemplateOcorrencia($ocorrenciaTeste)
                @endphp

                {!! $parser->handle() !!}
            @else
                <span>{!! $tipo->template ?? '<span class="text-muted">Nenhum template cadastrado</span>' !!}</span>
            @endif
        @endcomponent

        @component('ui::card')
            @slot('title')
                Considerações
            @endslot

            <span>{!! $tipo->consideracao ?? '<span class="text-muted">Nenhuma consideração informada</span>' !!}</span>
        @endcomponent

    </div>

@endsection