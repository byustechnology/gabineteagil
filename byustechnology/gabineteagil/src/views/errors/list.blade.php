@if ($errors->any())
<!-- Erro -->
<div class="modal fade" id="m-app-errors" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-body bg-danger text-white">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                
            </div>
            <div class="modal-footer bg-danger text-white" style="border-top: rgba(0, 0, 0, .2) 1px solid;">
                <button type="submit" class="btn btn-light" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#m-app-errors').modal('show');
    }, (jQuery));
</script>
@endif