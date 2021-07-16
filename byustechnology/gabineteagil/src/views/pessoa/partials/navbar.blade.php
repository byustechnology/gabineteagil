@component('gabinete::components.card')
    @slot('title')
        <h2 class="h6 d-block mb-0">Informações</h2>
    @endslot

    <div class="profile">
        <div class="bg-light mb-4 mt-n4 rounded mx-auto shadow" style="width: 250px; height: 250px;"></div>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link bg-light mb-2 rounded" href="{{ route('pessoa.show', ['pessoa' => $pessoa]) }}">Geral</a>
            <a class="nav-link bg-light mb-2 rounded" href="{{ route('ocorrencia.index', ['pessoa_id' => $pessoa]) }}">Ocorrências <span class="badge badge-secondary py-1 px-2 ml-1">{{ $pessoa->ocorrencias_count }}</a>
            <a class="nav-link bg-light mb-2 rounded" href="{{ route('pessoa.contato.index', ['pessoa' => $pessoa]) }}">Contatos <span class="badge badge-secondary py-1 px-2 ml-1">{{ $pessoa->contatos_count }}</a>
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