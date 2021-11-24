@extends('gabinete::layouts.main')
@section('title', 'Configurações')
@section('content')

    @component('gabinete::layouts.title')

        <h1 class="d-block mb-3 mt-4 h3">Configurações</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-configuracao')])
        @endslot
    @endcomponent

    {!! Form::open(['url' => route('configuracao.store'), 'method' => 'post', 'files' => true]) !!}
        <div class="container-fluid">
            @component('ui::card')
                @slot('title')
                    Cabeçalhos e rodapés
                @endslot

                <div class="row d-flex align-items-center">
                    <div class="col-lg-5">
                        {!! Form::label('cabecalho', 'Cabeçalho nos arquivos', ['class' => 'd-block']) !!}
                        {!! Form::file('cabecalho') !!}
                        <span class="form-text">Envie um arquivo neste campo caso deseje que os seus documentos tenham um cabeçalho definido.</span>
                    </div>
                    <div class="offset-lg-1 col-lg-6">
                        @if ( ! empty($configuracao->ocorrencia_template_cabecalho))
                            <img class="img-fluid rounded shadow-lg" src="{{ asset('storage/' . $configuracao->ocorrencia_template_cabecalho) }}" alt="Cabeçalho da ocorrência">
                        @endif
                    </div>
                </div>
            @endcomponent

            @component('ui::form-footer')
                <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
            @endcomponent
        </div>
    {!! Form::close() !!}
@endsection