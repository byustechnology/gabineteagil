@extends('gabinete::layouts.main')
@section('title', $prefeitura->titulo . ' - Prefeitura')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block my-3 mt-4 h3">{{ $prefeitura->titulo }} - Prefeitura</h1>

        @slot('actions')
            <a href="{{ route('prefeitura.edit', ['prefeitura' => $prefeitura]) }}" class="btn btn-success"><i class="far fa-edit fa-fw mr-1"></i> Editar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-prefeitura-show', $prefeitura)])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            @slot('title')
                Informações da prefeitura
            @endslot

            @component('ui::attribute', ['title' => 'Título'])
                {{ $prefeitura->titulo }}
            @endcomponent

            <div class="row">
                <div class="col-lg-7">
                    @component('ui::attribute', ['title' => 'Cidade'])
                        {{ $prefeitura->cidade }}
                    @endcomponent
                </div>
                <div class="col-lg-5">
                    @component('ui::attribute', ['title' => 'Estado'])
                        {{ $prefeitura->estado }}
                    @endcomponent
                </div>
            </div>

            <div class="row">
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Adicionado em'])
                        {{ $prefeitura->created_at->format('d/m/Y') }}, {{ $prefeitura->created_at->diffForHumans() }}
                    @endcomponent
                </div>
                <div class="col-lg">
                    @component('ui::attribute', ['title' => 'Alterado em'])
                        {{ $prefeitura->updated_at->format('d/m/Y') }}, {{ $prefeitura->updated_at->diffForHumans() }}
                    @endcomponent
                </div>
            </div>
        @endcomponent

        @component('ui::card')
            @if($usuarios->count())
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>E-mail</th>
                                <th>Prefeitura</th>
                                <th>Adicionado em</th>
                                <th class="table-actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td><a href="{{ url($usuario->path()) }}"><strong>{{ $usuario->name }}</strong></a></td>
                                    <td>{{ \ByusTechnology\Gabinete\Models\Usuario::TYPES[$usuario->type] }}</td>
                                    <td><a href="mailto:{{ $usuario->email }}">{{ $usuario->email }}</a></td>
                                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                                    <td>{{ optional($usuario->prefeitura)->titulo ?? 'Não atrelado' }}</td>
                                    <td class="table-actions">
                                        {!! Form::open(['url' => route('usuario.destroy', ['usuario' => $usuario]), 'method' => 'delete']) !!}
                                            <a href="{{ url($usuario->path() . '/personificar') }}">Personificar</a>
                                            <a data-toggle="tooltip" title="Editar" href="{{ route('usuario.edit', ['usuario' => $usuario]) }}" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                            <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link confirm-delete"><i class="far fa-trash-alt fa-fw"></i></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                @include('ui::no-results')
            @endif
        @endcomponent

    </div>

@endsection