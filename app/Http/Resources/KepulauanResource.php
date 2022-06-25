<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KepulauanResource extends JsonResource
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
            'kepulauan_id' => $this->kepulauan_id,
            'no_kepulauan' => $this->no_kepulauan,
            'nama' => $this->nama,
            'slug' => $this->slug,
        ];
    }
}
