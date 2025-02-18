<?php

namespace App\Controllers;

class Karyawan extends BaseController
{
    public function tambah(): string
    {
        return view('form-edit-karyawan');
    }
    public function edit(string $nip): string
    {
        $db = \Config\Database::connect();
        $query = "SELECT p.nip, p.nama, p.username, p.tim FROM pegawai p WHERE p.nip=$nip";
        $data = $db->query($query)->getResultArray();
        // $data = ["nip" => $nip];
        if (!$data) {
            return view("not-found");
        }
        return view('form-edit-karyawan', $data[0]);
    }
}
