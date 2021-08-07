@if ($errors->any())
<!-- Erro -->
<div class="modal fade" id="m-app-errors" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-body bg-danger text-white rounded-lg">
                <ul class="list-unstyled mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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