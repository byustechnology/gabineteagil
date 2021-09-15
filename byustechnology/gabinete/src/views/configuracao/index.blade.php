@extends('gabinete::layouts.main')
@section('title', 'Mapa')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Configurações</h1>

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-configuracao')])
        @endslot
    @endcomponent

    <div class="container-fluid">
        @component('ui::card')
            
        @endcomponent

        @component('ui::card')
            @slot('title')
                Cabeçalhos e rodapés
            @endslot

            <div class="row">
                <div class="col-lg-5">
                    {!! Form::label('cabecalho', 'Cabeçalho nos arquivos', ['class' => 'd-block']) !!}
                    {!! Form::file('cabecalho') !!}
                    <span class="form-text">Envie um arquivo neste campo caso deseje que os seus documentos tenham um cabeçalho definido.</span>
                </div>
            </div>
        @endcomponent
    </div>
@endsection