<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DaerahResource extends JsonResource
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
            'daerah_id' => $this->daerah_id,
            'no_daerah' => $this->no_daerah,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'kawasan' => $this->getKawasan->nama,
            'provinsi' => $this->getProvinsi->nama,
            'kabupaten' => $this->getProvinsi->nama,
        ];
    }
}
