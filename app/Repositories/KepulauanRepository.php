<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\KepulauanModel;
use App\Helpers\DateTimeHelpers;
use App\Helpers\ResponseHelpers;
use App\Http\Resources\KepulauanResource;
use Dotenv\Validator;

class KepulauanRepository
{
    public function getListData()
    {
        try {
            // ambil data dari Resources
            $data = KepulauanResource::collection(KepulauanModel::get());

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
            $namaKepulauan = isset($params['nama']) ? $params['nama'] : '';

            if (strlen($namaKepulauan) == 0) {
                return ResponseHelpers::getResponseErrorQuery(
                    400,
                    'Nama tidak boleh kosong'
                );
            }

            // validasi data jika kosong
            $kepulauanId = isset($params['kepulauan_id'])
                ? $params['kepulauan_id']
                : '';
            if (strlen($kepulauanId) == 0) {
                // query data untuk post data baru
                $data = new KepulauanModel();
            } else {
                // query untuk ubah data dengan find data
                $data = KepulauanModel::find($kepulauanId);

                // validasi cek data jika kosong
                if (is_null($data)) {
                    return ResponseHelpers::getResponseErrorQuery(
                        400,
                        'Data tidak ditemukan'
                    );
                }
            }

            $data->no_kepulauan = Str::uuid();
            $data->nama = Str::ucfirst($namaKepulauan);
            $data->slug = Str::slug($namaKepulauan);
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
