<div class="attribute shadow-sm">
    <span class="d-block mb-1">{{ $mensagem->mensagem }}</span>
    <small class="text-muted d-block">{{ optional($mensagem->user)->name ?? 'Sistema' }}, em {{ $mensagem->created_at->format('d/m/Y') }}</small></span>
        
    @if ($mensagem->has('arquivos'))
        @foreach($mensagem->arquivos as $arquivo)
            <a href="{{ $arquivo->url }}" class="mt-1 btn-link" data-toggle="tooltip" title="{{ $arquivo->arquivo }}" target="_blank"><i class="{{ $arquivo->icone_mime }}"></i> <small>{{ $arquivo->arquivo }}</small></a>
        @endforeach
    @endif
</div>