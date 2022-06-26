<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\KawasanModel;
use App\Helpers\ResponseHelpers;
use App\Http\Resources\KawasanResource;

class KawasanRepository
{
    public function aksiGetSearch($params)
    {
        try {
            // get Data
            $data = KawasanModel::query();
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
            $data = $data->with('getProvinsi')->get();
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
            $data = KawasanResource::collection(
                KawasanModel::with('getProvinsi.getKabupaten.getDaerah')->get()
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

            // validasi data jika kosong
            $kawasanId = isset($params['kawasan_id'])
                ? $params['kawasan_id']
                : '';
            if (strlen($kawasanId) == 0) {
                // query data untuk post data baru
                $data = new KawasanModel();
            } else {
                // query untuk ubah data dengan find data
                $data = KawasanModel::find($kawasanId);

                // validasi cek data jika kosong
                if (is_null($data)) {
                    return ResponseHelpers::getResponseErrorQuery(
                        400,
                        'Data tidak ditemukan'
                    );
                }
            }

            $data->no_kawasan = Str::uuid();
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
