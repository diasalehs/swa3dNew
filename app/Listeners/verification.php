<?php

namespace App\Listeners;

use App\Events\verify;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class verification
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
     * @param  verify  $event
     * @return void
     */
    public function handle(verify $event)
    {
        //
    }
}
