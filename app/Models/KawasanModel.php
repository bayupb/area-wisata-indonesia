<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class KawasanModel extends Model
{
    protected $table = 'kawasan';
    protected $primaryKey = 'kawasan_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->hasMany('App\Models\ProvinsiModel', 'provinsi_id');
    }
    public function getKabupaten()
    {
        return $this->hasMany('App\Models\KabupatenModel', 'kabupaten_id');
    }

    public function getDaerah()
    {
        return $this->hasMany(
            'App\Models\DaerahModel',
            'kawasan_id',
            'kawasan_id'
        );
    }
}
