<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinsiResource extends JsonResource
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
            'provinsi_id' => $this->provinsi_id,
            'no_provinsi' => $this->no_provinsi,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'kawasan_id' => $this->kawasan_id,
            'kawasan' => $this->getKawasan->nama,
            'kawasan_detail' => $this->getKawasan,
        ];
    }
}
