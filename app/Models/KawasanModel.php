<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KawasanModel extends Model
{
    protected $table = 'kawasan';
    protected $primaryKey = 'kawasan_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->hasMany('App\Models\ProvinsiModel', 'provinsi_id');
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
