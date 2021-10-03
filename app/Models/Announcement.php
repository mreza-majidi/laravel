<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Document
 *
 * @package  App\Models
 *
 * @property int      id
 * @property string   uuid
 * @property string   priority
 * @property DateTime begin
 * @property DateTime end
 * @property boolean  is_active
 * @property string   text
 * @property DateTime created_at
 * @property DateTime deleted_at
 * @property DateTime updated_at
 */
class Announcement extends Model
{
    use HasFactory, SoftDeletes, HasUuidTrait;

    protected $guarded = ['id', 'uuid'];

    protected $hidden = ['created_at', 'id', 'updated_at', 'deleted_at'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * @param DateTime $begin
     */
    public function setBegin(DateTime $begin)
    {
        $this->begin = $begin;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd(DateTime $end)
    {
        $this->end = $end;
    }


    /**
     * @return boolean
     */
    public function isIsActive()
    {
        return $this->is_active;
    }


    /**
     * @param boolean $is_active
     */
    public function setIsActive(bool $is_active)
    {
        $this->is_active = $is_active;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @param string $priority
     */
    public function setPriority(string $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
