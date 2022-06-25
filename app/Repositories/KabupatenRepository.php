<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\KabupatenModel;
use App\Helpers\ResponseHelpers;
use App\Http\Resources\KabupatenResource;

class KabupatenRepository
{
    public function aksiGetSearch($params)
    {
        try {
            // get Data
            $data = KabupatenModel::query();
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
            $data = $data->with(['getKepulauan', 'getProvinsi'])->get();
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
            $data = KabupatenResource::collection(KabupatenModel::get());
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
            $kepulauanId = isset($params['kepulauan_id'])
                ? $params['kepulauan_id']
                : '';
            if (strlen($kepulauanId) == 0) {
                return ResponseHelpers::getResponseErrorQuery(
                    400,
                    'Kepulauan tidak boleh kosong'
                );
            }
            $provinsiId = isset($params['provinsi_id'])
                ? $params['provinsi_id']
                : '';
            if (strlen($provinsiId) == 0) {
                return ResponseHelpers::getResponseErrorQuery(
                    400,
                    'Provinsi tidak boleh kosong'
                );
            }

            // validasi data jika kosong
            $kabupatenId = isset($params['kabupaten_id'])
                ? $params['kabupaten_id']
                : '';
            if (strlen($kabupatenId) == 0) {
                // query data untuk post data baru
                $data = new KabupatenModel();
            } else {
                // query untuk ubah data dengan find data
                $data = KabupatenModel::find($kabupatenId);

                // validasi cek data jika kosong
                if (is_null($data)) {
                    return ResponseHelpers::getResponseErrorQuery(
                        400,
                        'Data tidak ditemukan'
                    );
                }
            }

            $data->no_kabupaten = Str::uuid();
            $data->kepulauan_id = $kepulauanId;
            $data->provinsi_id = $provinsiId;
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
