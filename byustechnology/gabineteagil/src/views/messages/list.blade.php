@if (session()->has('flash_success'))
<div class="flash-container">
    <div class="alert alert-timeout alert-success alert-dismissible bg-success text-white fade show border-0">
        {!! session()->get('flash_success') !!}
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if (session()->has('flash_warning'))
<div class="flash-container">
    <div class="alert alert-timeout alert-warning alert-dismissible bg-warning fade show border-0">
        {!! session()->get('flash_warning') !!}
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if (session()->has('flash_danger'))
<div class="flash-container">
    <div class="alert alert-timeout alert-danger bg-danger text-white alert-dismissible fade show border-0">
        {!! session()->get('flash_danger') !!}
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

<script>
    $(function() {
        window.setTimeout(function() {
            $('.alert-timeout').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    }, (jQuery));
</script>