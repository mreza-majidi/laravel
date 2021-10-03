<?php

namespace App\Events;

use App\Models\Media;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AfterUploadEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Media $media;

    /**
     * Create a new event instance.
     *
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media
    {
        return $this->media;
    }
}
