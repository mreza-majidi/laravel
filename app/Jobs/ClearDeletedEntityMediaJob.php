<?php

namespace App\Jobs;

use App\Models\Media;

/**
 * Class ClearDeletedEntityMediaJob
 *
 * @package App\Jobs
 */
class ClearDeletedEntityMediaJob extends AbstractBaseJob
{
    private string $entityType;
    private int $entityId;

    /**
     * Create a new job instance.
     *
     * @param string  $entityType
     * @param integer $entityId
     */
    public function __construct(string $entityType, int $entityId)
    {
        $this->entityType = $entityType;
        $this->entityId   = $entityId;
    }

    /**
     * Execute the job.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function handle()
    {
        Media::query()->where([
            ['entity_type', '=', $this->entityType],
            ['entity_id', '=', $this->entityId],
        ])->delete();
    }
}
