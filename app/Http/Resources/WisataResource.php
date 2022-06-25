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
            'wisata_id' => $this->wisata_id,
            'no_wisata' => $this->no_wisata,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'kawasan' => $this->getKawasan->nama,
            'provinsi' => $this->getProvinsi->nama,
            'kabupaten' => $this->getProvinsi->nama,
        ];
    }
}
