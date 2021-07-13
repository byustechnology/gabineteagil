<div class="attribute">
    <span class="d-block mb-1">{{ $mensagem->mensagem }}</span>
    <div class="d-flex align-items-center justify-content-between">
        <small class="text-muted">{{ optional($mensagem->user)->name ?? 'Sistema' }}, em {{ $mensagem->created_at->format('d/m/Y') }}</small></span>
        
        @if ($mensagem->has('arquivos'))
            @foreach($mensagem->arquivos as $arquivo)
                <a href="{{ $arquivo->url }}" class="btn-link" data-toggle="tooltip" title="{{ $arquivo->arquivo }}" target="_blank"><i class="{{ $arquivo->icone_mime }}"></i></a>
            @endforeach
        @endif
    </div>
</div>