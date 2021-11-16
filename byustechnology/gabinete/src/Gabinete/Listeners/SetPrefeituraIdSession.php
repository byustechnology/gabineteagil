<?php

namespace ByusTechnology\Gabinete\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetPrefeituraIdSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Definindo o ID do prefeitura referente
        // ao usuário.
        session()->put('prefeitura', $event->user->prefeitura_id);
    }
}