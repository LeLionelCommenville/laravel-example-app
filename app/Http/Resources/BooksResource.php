<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
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
            'id' => (string)$this->id,
            'type' => 'Books',
            'attributes' => [
                'title'    => $this->title,
                'slug'     => $this->slug,
                'overview' => $this->overview
            ]
        ];
    }
}
