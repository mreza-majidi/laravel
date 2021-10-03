<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class RequestFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     * @param string $name
     *
     * @return RequestFilter|Builder
     */
    public function name(string $name)
    {
        return $this->whereHas('user', function (Builder $builder) use ($name) {
            return $builder->whereHas('profile', function (Builder $builder) use ($name) {
                return $builder->where('last_name', 'like', "%{$name}%")
                               ->orWhere('first_name', 'like', "%{$name}%")
                    ;
            });
        });
    }


    /**
     * @param string $created_at
     *
     * @return self
     */
    public function createdAt(string $created_at)
    {
        return $this->whereDate('created_at', '=', $created_at);
    }

    /**
     * @param string $reference_id
     *
     * @return self
     */
    public function reference(string $reference_id)
    {
        return $this->where('reference_id', 'LIKE', $reference_id);
    }

    /**
     * @param string $email
     *
     * @return self
     */
    public function email(string $email)
    {
        return $this->whereHas('user', function (Builder $builder) use ($email) {
            return $builder->where('email', 'LIKE', "%{$email}%");
        });
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function requestType(string $value)
    {
        return $this->where('type', '=', $value);
    }
}
