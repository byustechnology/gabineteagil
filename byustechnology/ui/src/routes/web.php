<?php

Route::get(config('ui.path') . '/check', function() {
    return 'UI is installed!';
});