<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    public function tambah(): string
    {
        return view('tambah-pegawai');
    }
    public function add()
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            "nip" => $this->request->getPost("nip"),
            "nama" => $this->request->getPost("nama"),
            "tim" => $this->request->getPost("tim"),
            "username" => $this->request->getPost("username"),
            "password" => $this->request->getPost("password")
        ];
        $pegawaiModel->insert($data);
        return redirect()->to("/");
    }
    public function edit(string $nip): string
    {
        $pegawaiModel = new PegawaiModel();
        $data = $pegawaiModel->find($nip);
        if (!$data) {
            return view("not-found");
        }
        return view('form-edit-karyawan', $data);
    }
    public function delete(string $nip)
    {
        $pegawaiModel = new PegawaiModel();
        $pegawaiModel->delete($nip);
        return redirect()->to("/");
    }
    public function update(string $nip)
    {
        // $pegawaiModel = new PegawaiModel();
        // $data 
        caranya sama seperti tambah tapi insert ganti save
    }
}
