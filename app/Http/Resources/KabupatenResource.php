<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KabupatenResource extends JsonResource
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
            'kabupaten_id' => $this->kabupaten_id,
            'no_kabupaten' => $this->no_kabupaten,
            'nama' => $this->nama,
            'slug' => $this->slug,
            'kawasan' => $this->getKawasan->nama,
            'provinsi' => $this->getProvinsi->nama,
        ];
    }
}
