<?php

namespace App\ModelFilters;

use App\Constants\UserConstants;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * @param string $email
     *
     * @return UserFilter
     */
    public function email(string $email): self
    {
        return $this->whereLike('email', "%{$email}%");
    }

    /**
     * @param string $status
     *
     * @return UserFilter
     */
    public function status(string $status): self
    {
        return $this->whereLike('status', $status);
    }

    /**
     * @param string $name
     *
     * @return UserFilter
     */
    public function name(string $name): self
    {
        return $this->whereHas('profile', function (Builder $builder) use ($name) {
            return $builder->where('last_name', 'like', "%{$name}%")
                           ->orWhere('first_name', 'like', "%{$name}%")
                ;
        });
    }

    /**
     * @param string $mobile
     *
     * @return UserFilter
     */
    public function mobile(string $mobile): self
    {
        return $this->whereHas('profile', function (Builder $builder) use ($mobile) {
            return $builder->where('mobile_number', 'like', "%{$mobile}%");
        });
    }

    /**
     * @param string $nationalNumber
     *
     * @return UserFilter
     */
    public function nationalNumber(string $nationalNumber): self
    {
        return $this->whereHas('profile', function (Builder $builder) use ($nationalNumber) {
            return $builder->where('national_number', 'like', "%{$nationalNumber}%");
        });
    }

    /**
     * @return $this
     */
    public function userSuspend(): self
    {
        return $this->where('status', UserConstants::STATUS_SUSPEND);
    }
}
