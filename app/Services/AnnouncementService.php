<?php

namespace App\Services;

use App\Models\Announcement;
use Carbon\Carbon;

/**
 * Class AnnouncementService
 *
 * @package App\Services
 */
class AnnouncementService extends BaseService
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function publicAnnouncement()
    {
        $announcements = Announcement::query()->orderBy('begin', 'DESC')->where('end', '<=', Carbon::now())
                                     ->where('is_active', '=', true)->limit(3)->get()
        ;

        return $announcements;
    }
}
