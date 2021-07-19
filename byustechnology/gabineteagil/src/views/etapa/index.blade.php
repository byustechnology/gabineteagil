@extends('gabinete::layouts.main')

@section('content')

    @component('gabinete::layouts.title')
        <h1 class="d-block my-3 mt-4 h3">Etapas</h1>
    @endcomponent
    @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-dashboard')])

    <div class="table-responsive">
        <table class="table table-nowrap">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ordem</th>
                    <th>Cor</th>
                    <th class="table-actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etapas as $etapa)
                    <tr>
                        <td><a href="{{ url($etapa->path()) }}"><strong>{{ $etapa->titulo }}</strong></a></td>
                        <td>{{ $etapa->ordem }}</td>
                        <td><i class="fas fa-square fa-fw mr-2" style="color: {{ $etapa->cor }}"></i>{{ $etapa->cor }}</td>
                        <td class="table-actions">
                            {!! Form::open(['url' => '', 'method' => 'delete']) !!}
                                <a data-toggle="tooltip" title="Editar" href="#" class="btn btn-table-actions btn-link"><i class="far fa-edit fa-fw"></i></a>
                                <button data-toggle="tooltip" title="Remover" type="sumbit" class="btn btn-table-actions text-danger btn-link"><i class="far fa-trash-alt fa-fw"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection