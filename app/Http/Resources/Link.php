<?php

namespace David\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Link extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return specific columns
        /*return [
          'id' => $this->id,
          'subject' => $this->subject,
          'link' => $this-link,

        ]*/
    }
}
