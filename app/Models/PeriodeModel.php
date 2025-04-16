<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
    protected $table = 'periode'; // Ganti sesuai tabel kamu
    protected $allowedFields = ['tahun', 'bulan', 'event', 'tanggal_mulai', 'tanggal_selesai'];
}
