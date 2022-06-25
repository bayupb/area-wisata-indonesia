<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\KepulauanRepository;

class KepulauanController extends Controller
{
    protected KepulauanRepository $indonesia;
    public function __construct()
    {
        $this->indonesia = new KepulauanRepository();
    }
    public function getListData()
    {
        $data = $this->indonesia->getListData();
        return $data;
    }
    public function getPostList(Request $request)
    {
        $data = [
            'kepulauan_id' => $request->input('kepulauan_id'),
            'nama' => $request->input('nama'),
        ];
        $data = $this->indonesia->getPostList($data);
        return $data;
    }
}
