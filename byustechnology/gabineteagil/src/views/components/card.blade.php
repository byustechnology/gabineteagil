<div class="card my-3 shadow-sm">

    @if (isset($title))
        <div class="card-header bg-white py-3">{{ $title }}</div>
    @endif

    <div class="card-body">
        {{ $slot ?? '' }}
    </div>
</div>