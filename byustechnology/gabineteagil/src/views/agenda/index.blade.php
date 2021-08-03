@extends('gabinete::layouts.main')
@section('title', 'Agendas')
@section('content')

    @component('gabinete::layouts.title')
        
        <h1 class="d-block mb-3 mt-4 h3">Agendas</h1>

        @slot('actions')
            <a href="{{ route('agenda.create') }}" class="btn btn-success"><i class="far fa-plus-square fa-fw mr-1"></i> Adicionar</a>
        @endslot

        @slot('breadcrumbs')
            @include('gabinete::layouts.breadcrumbs', ['b' => Breadcrumbs::render('g-agenda')])
        @endslot
    @endcomponent

    <div class="container-fluid">

        @component('ui::card')
            <div id="calendar"></div>
        @endcomponent

        @include('gabinete::agenda.partials.search')
    </div>
@endsection

@section('meta')
    <link href="{{ asset('fullcalendar/main.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locales/pt-br.js') }}"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            eventSources: [{
                url: '{{ route('fullcalendar') }}', 
                method: 'get', 
                failure: function() {
                    alert('Desculpe, não foi possível carregar os eventos')
                }
            }], 
            locale: 'pt-br', 

            @if (request()->has('visualizacao'))
                initialView: '{{ request('visualizacao') }}'
            @else
                initialView: 'dayGridMonth'
            @endif
        });
        calendar.render();
      });

    </script>
@endsection