<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataModel extends Model
{
    protected $table = 'wisata';
    protected $primaryKey = 'wisata_id';
    public $timestamps = false;

    public function getProvinsi()
    {
        return $this->belongsTo('App\Models\ProvinsiModel', 'provinsi_id');
    }
    public function getDaerah()
    {
        return $this->belongsTo('App\Models\DaerahModel', 'daerah_id');
    }
    public function getKabupaten()
    {
        return $this->belongsTo('App\Models\KabupatenModel', 'kabupaten_id');
    }
    public function getKepulauan()
    {
        return $this->belongsTo('App\Models\KepulauanModel', 'kepulauan_id');
    }
}
