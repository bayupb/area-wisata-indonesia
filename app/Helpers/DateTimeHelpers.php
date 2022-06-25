<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

class DateTimeHelpers
{
    public static function getDateIndonesia()
    {
        $lokasi = 'Asia/Jakarta';
        $tanggal = Date('Y-m-d');
        $waktu = Date('H:i:s');

        $tanggalWaktu = new DateTime($tanggal . ' ' . $waktu);
        $tanggalWaktu->setTimezone(new DateTimeZone($lokasi));
        return $tanggalWaktu->format('Y-m-d H:i:s');
    }
}
