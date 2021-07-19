@if (session()->has('flash_modal_success'))
<!-- Erro -->
<div class="modal fade" id="m-flash-modal-success" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-body bg-success text-white text-center">
                <span>{!! session()->get('flash_modal_success') !!}</span>                
            </div>

            @if (session()->has('flash_modal_success_action'))
                <div class="modal-footer">
                    {!! session()->get('flash_modal_success_action') !!}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#m-flash-modal-success').modal('show');
    }, (jQuery));
</script>
@endif