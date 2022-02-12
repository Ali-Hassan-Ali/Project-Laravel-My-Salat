<?php

namespace App\Listeners;

use App\Events\BannerOwner;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OwnerCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BannerOwner  $event
     * @return void
     */
    public function handle(BannerOwner $event)
    {

        $event->owner->owner()->create([
            'categoreys_id' => '1',
            'title'         => 'title',
            'owner_id'      => $event->owner->id,
        ]);   

    }//end of handle

}//end of class
