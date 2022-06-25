<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProvinsiRepository;

class ProvinsiController extends Controller
{
    protected ProvinsiRepository $indonesia;
    public function __construct()
    {
        $this->indonesia = new ProvinsiRepository();
    }
    public function getListData()
    {
        $data = $this->indonesia->getListData();
        return $data;
    }
    public function getPostList(Request $request)
    {
        $data = [
            'provinsi_id' => $request->input('provinsi_id'),
            'nama' => $request->input('nama'),
            'kawasan_id' => $request->input('kawasan_id'),
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
