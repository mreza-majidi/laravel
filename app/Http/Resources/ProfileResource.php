<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{


    public function __construct($resource, $status = false)
    {
        $this->status = $status;
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        [

            'status'          => $this->status,
            'message'         => $this->status ? __('messages.profile_messages.success') : __('messages.profile_messages.failed'),
            'id'              => $this->resource->id,
            'uuid'            => $this->resource->uuid,
            'first_name'      => $this->resource->first_name,
            'last_name'       => $this->resource->last_name,
            'mobile_number'   => $this->resource->mobile_number,
            'national_number' => $this->resource->national_number,
            'address'         => $this->resource->address,
            'avatar'          => $this->resource->avatar,
            'birth_date'      => $this->resource->birth_date,

        ];
    }
}
