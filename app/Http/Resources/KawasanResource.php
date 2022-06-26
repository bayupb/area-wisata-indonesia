<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KawasanResource extends JsonResource
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
            'kawasan_id' => $this->kawasan_id,
            'no_kawasan' => $this->no_kawasan,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'get_provinsi' => $this->getProvinsi,
        ];
    }
}
