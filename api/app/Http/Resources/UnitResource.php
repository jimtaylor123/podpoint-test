<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UnitResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'address' => $this->address,
                'postcode' => $this->postcode,
                'name' => $this->name,
                'status' => $this->status,
                'created' => $this->created_at->toDateTimeString(),
                'last_updated' => $this->updated_at->diffForHumans(),
                'charges' => $this->charges
            ],
            'links' => [
                'self' => $this->path(),
            ]
        ];
    }
}
