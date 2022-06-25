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
        return $this->belongsTo('App\Models\ProvinsiModel', 'provinsi_id');
    }
    public function getDaerah()
    {
        return $this->hasMany('App\Models\DaerahModel', 'provinsi_id');
    }

    // public function kota()
    // {
    //     return $this->belongsTo(
    //         'App\Models\indonesia\KotaModel',
    //         'kota_id',
    //         'kota_id'
    //     );
    // }
}
