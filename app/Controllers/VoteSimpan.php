<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class VoteSimpan extends Controller
{
    public function simpan()
    {
        $json = $this->request->getJSON(true);

        // Simpan data ke database atau file di sini
        // Misal simpan ke log dulu:
        log_message('info', 'Data voting: ' . json_encode($json));

        return $this->response->setJSON(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    }
}
