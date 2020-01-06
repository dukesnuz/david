<?php

namespace David\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Blogsearch extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return specific columns
        return [
          'id' => $this->id,
          'term' => $this->term,
        ];
    }
}
