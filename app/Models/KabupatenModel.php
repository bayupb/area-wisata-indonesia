<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenModel extends Model
{
    protected $table = 'kabupaten';
    protected $primaryKey = 'kabupaten_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->belongsTo(
            'App\Models\ProvinsiModel',
            'provinsi_id',
            'provinsi_id'
        );
    }
    public function getKawasan()
    {
        return $this->belongsTo(
            'App\Models\KawasanModel',
            'kawasan_id',
            'kawasan_id'
        );
    }
    public function getDaerah()
    {
        return $this->hasMany(
            'App\Models\DaerahModel',
            'daerah_id',
            'daerah_id'
        );
    }
}
