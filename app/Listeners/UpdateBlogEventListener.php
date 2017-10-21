<?php

namespace App\Listeners;

use App\Events\UpdateBlogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBlogEventListener
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
     * @param  UpdateBlogEvent  $event
     * @return void
     */
    public function handle(UpdateBlogEvent $event)
    {
        //
    }
}
