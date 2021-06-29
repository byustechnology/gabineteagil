<div class="title">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">
            {{ $slot }}

            <div class="actions">
                {{ $actions ?? '' }}
            </div>
        </div>
    </div>
</div>
<div class="breadcrumbs">
    {{ $breadcrumbs ?? '' }}
</div>