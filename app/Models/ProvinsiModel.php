<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'provinsi_id';
    public $timestamps = false;

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
            'deaerah_id',
            'daerah_id'
        );
    }
}
