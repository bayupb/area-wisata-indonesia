<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\KepulauanModel;
use App\Helpers\ResponseHelpers;
use App\Http\Resources\ProvinsiResource;
use App\Models\ProvinsiModel;

class ProvinsiRepository
{
    public function aksiGetSearch($params)
    {
        try {
            // get Data
            $data = ProvinsiModel::query();
            // query cari dari kontroller
            $cari = isset($params['cari']) ? $params['cari'] : '';
            if (strlen($cari) > 0) {
                $data->where(function ($query) use ($cari) {
                    // query cari berdasarkan slug dengan parameter : api/indonesia/{table}/q?cari={slug}
                    $query->whereRaw(
                        "lower(slug) LIKE '%" . strtolower($cari) . "%'"
                    );
                });
            }
            $data = $data->with('getKawasan')->get();
            return ResponseHelpers::ResponseSuccess(
                200,
                'Sukses mengambil Data',
                $data
            );
        } catch (\Exception $e) {
            return ResponseHelpers::getResponseError(400, $e->getMessage());
        }
    }
    public function getListData()
    {
        try {
            // ambil data dari Resources
            $data = ProvinsiResource::collection(
                ProvinsiModel::with('getKawasan')->get()
            );
            // response berhasil menggunakan App\ResponseHelpers
            return ResponseHelpers::ResponseSuccess(
                200,
                'Sukses mengambil Data',
                $data
            );
        } catch (\Exception $e) {
            // response gagal langsung ke notification server
            return ResponseHelpers::getResponseError(400, $e->getMessage());
        }
    }

    public function getPostList($params)
    {
        try {
            // validasi nama
            $nama = isset($params['nama']) ? $params['nama'] : '';
            if (strlen($nama) == 0) {
                return ResponseHelpers::getResponseErrorQuery(
                    400,
                    'Nama tidak boleh kosong'
                );
            }
            $kawasanId = isset($params['kawasan_id'])
                ? $params['kawasan_id']
                : '';
            if (strlen($kawasanId) == 0) {
                return ResponseHelpers::getResponseErrorQuery(
                    400,
                    'Kawasan tidak boleh kosong'
                );
            }

            // validasi data jika kosong
            $provinsiId = isset($params['provinsi_id'])
                ? $params['provinsi_id']
                : '';
            if (strlen($provinsiId) == 0) {
                // query data untuk post data baru
                $data = new ProvinsiModel();
            } else {
                // query untuk ubah data dengan find data
                $data = ProvinsiModel::find($provinsiId);

                // validasi cek data jika kosong
                if (is_null($data)) {
                    return ResponseHelpers::getResponseErrorQuery(
                        400,
                        'Data tidak ditemukan'
                    );
                }
            }

            $data->no_provinsi = Str::uuid();
            $data->kawasan_id = $kawasanId;
            $data->nama = Str::ucfirst($nama);
            $data->slug = Str::slug($nama);
            $data->save();

            // response berhasil menggunakan App\ResponseHelpers
            return ResponseHelpers::ResponseSuccess(
                200,
                'Sukses menerima data',
                $data
            );
        } catch (\Exception $e) {
            // response gagal langsung ke notification server
            return ResponseHelpers::getResponseError(400, $e->getMessage());
        }
    }
}
