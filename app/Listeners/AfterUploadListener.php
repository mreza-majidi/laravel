<?php

namespace App\Listeners;

use App\Events\AfterUploadEvent;
use App\Jobs\AfterImageUploadJob;

class AfterUploadListener
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
     * @param AfterUploadEvent $event
     *
     * @return void
     */
    public function handle(AfterUploadEvent $event)
    {
        $media = $event->getMedia();
        if (fileService()->checkIfImage($media->extension)) {
            dispatch(new AfterImageUploadJob($media));
        }
    }
}
