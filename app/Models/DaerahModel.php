<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaerahModel extends Model
{
    protected $table = 'daerah';
    protected $primaryKey = 'daerah_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->belongsTo('App\Models\ProvinsiModel', 'provinsi_id');
    }
    public function getKabupaten()
    {
        return $this->belongsTo('App\Models\KabupatenModel', 'kabupaten_id');
    }
    public function getKepulauan()
    {
        return $this->belongsTo('App\Models\KepulauanModel', 'kepulauan_id');
    }
    public function getWisata()
    {
        return $this->hasMany('App\Models\WisataModel', 'daerah_id');
    }
}
