<?php

namespace App\Http\Controllers;

use App\Repositories\KawasanRepository;
use Illuminate\Http\Request;

class KawasanController extends Controller
{
    protected KawasanRepository $indonesia;
    public function __construct()
    {
        $this->indonesia = new KawasanRepository();
    }
    public function getListData()
    {
        $data = $this->indonesia->getListData();
        return $data;
    }
    public function getPostList(Request $request)
    {
        $data = [
            'kawasan_id' => $request->input('kawasan_id'),
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
