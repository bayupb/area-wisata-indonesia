<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepulauanModel extends Model
{
    protected $table = 'kepulauan';
    protected $primaryKey = 'kepulauan_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->belongsTo('App\Models\ProvinsiModel', 'provinsi_id');
    }

    public function getDaerah()
    {
        return $this->hasMany('App\Models\DaerahModel', 'kepulauan_id');
    }
}
