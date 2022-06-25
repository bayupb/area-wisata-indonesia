<?php

namespace App\Http\Controllers;

use App\Repositories\DaerahRepository;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    protected DaerahRepository $indonesia;
    public function __construct()
    {
        $this->indonesia = new DaerahRepository();
    }
    public function getListData()
    {
        $data = $this->indonesia->getListData();
        return $data;
    }
    public function getPostList(Request $request)
    {
        $data = [
            'daerah_id' => $request->input('daerah_id'),
            'kabupaten_id' => $request->input('kabupaten_id'),
            'provinsi_id' => $request->input('provinsi_id'),
            'kepulauan_id' => $request->input('kepulauan_id'),
            'nama' => $request->input('nama'),
        ];
        $data = $this->indonesia->getPostList($data);
        return $data;
    }

    public function getSearchData(Request $request)
    {
        $data = [
            'cari' => $request->input('cari'),
        ];
        $data = $this->indonesia->aksiGetSearch($request);
        return $data;
    }
}
