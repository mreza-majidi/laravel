<?php

namespace App\Jobs;

use App\Models\Media;

class AfterImageUploadJob extends AbstractBaseJob
{
    private Media $media;

    /**
     * Create a new job instance.
     *
     * @param Media $media
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->compressImage();
        $this->updateDatabase();
        $this->createThumbnail();
    }

    /**
     *
     */
    private function compressImage(): void
    {
        fileService()->compressImage($this->media->getAbsolutePath());
    }

    /**
     *
     */
    private function updateDatabase(): void
    {
        $newFileSize = fileService()->getFileSize($this->media->getAbsolutePath());
        if ($newFileSize !== $this->media->size) {
            $this->media->size = $newFileSize;
            $this->media->save();
        }
    }

    /**
     *
     */
    private function createThumbnail()
    {
        fileService()->createThumbnailWithCompression($this->media->getAbsolutePath(), $this->media->getThumbnailAbsolutePath());
    }
}
