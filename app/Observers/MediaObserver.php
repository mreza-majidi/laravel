<?php

namespace App\Observers;

use App\Events\AfterUploadEvent;
use App\Jobs\RemoveDeletedMediaFilesJob;
use App\Models\Media;

class MediaObserver
{
    /**
     * Handle the Media "created" event.
     *
     * @param  \App\Models\Media $media
     *
     * @return void
     */
    public function created(Media $media)
    {
        event(new AfterUploadEvent($media));
    }

    /**
     * Handle the Media "updated" event.
     *
     * @param  \App\Models\Media $media
     *
     * @return void
     */
    public function updated(Media $media)
    {
        //
    }

    /**
     * Handle the Media "deleted" event.
     *
     * @param  \App\Models\Media $media
     *
     * @return void
     */
    public function deleted(Media $media)
    {
        dispatch(new RemoveDeletedMediaFilesJob($media));
    }

    /**
     * Handle the Media "restored" event.
     *
     * @param  \App\Models\Media $media
     *
     * @return void
     */
    public function restored(Media $media)
    {
        //
    }

    /**
     * Handle the Media "force deleted" event.
     *
     * @param  \App\Models\Media $media
     *
     * @return void
     */
    public function forceDeleted(Media $media)
    {
        //
    }
}
