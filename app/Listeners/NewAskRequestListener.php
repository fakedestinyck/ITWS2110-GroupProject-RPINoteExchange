<?php

namespace App\Listeners;

use App\Events\NewAskRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAskRequestListener
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
     * @param  NewAskRequest  $event
     * @return void
     */
    public function handle(NewAskRequest $event)
    {
        //
    }
}
