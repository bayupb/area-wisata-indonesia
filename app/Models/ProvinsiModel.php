<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinsiModel extends Model
{
    protected $table = 'provinsi';
    protected $primaryKey = 'provinsi_id';
    public $timestamps = false;

    public function getKepulauan()
    {
        return $this->belongsTo('App\Models\KepulauanModel', 'provinsi_id');
    }

    public function getDaerah()
    {
        return $this->hasMany('App\Models\DaerahModel', 'provinsi_id');
    }
}
