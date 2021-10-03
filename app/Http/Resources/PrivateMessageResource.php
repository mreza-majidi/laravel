<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateMessageResource extends JsonResource
{
    public function __construct($resource)
    {
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
        return [

            'title'     => $this->resource->title,
            'seen'      => $this->resource->seen,
            'created_at' => $this->resource->created_at,
            'link'      => route('website.api.user.private_message.index', $this->resource->uuid, true),
        ];
    }
}
