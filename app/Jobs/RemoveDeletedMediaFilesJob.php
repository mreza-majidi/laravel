<?php

namespace App\Jobs;

use App\Models\Media;

class RemoveDeletedMediaFilesJob extends AbstractBaseJob
{
    /**
     * @var Media
     */
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
        // remove primary file
        //        fileService()->removeFile($this->media->getAbsolutePath());

        // remove thumbnail file
        //        fileService()->removeFile($this->media->getThumbnailAbsolutePath());
    }
}
