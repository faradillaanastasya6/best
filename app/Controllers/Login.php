<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function auth()
    {
        $session = session();
        $model = new PegawaiModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $pegawai = $model->where('username', $username)->first();

        if ($pegawai) {
            if (password_verify($password, $pegawai['password'])) {
                // Set session jika login berhasil
                $session->set([
                    'nip'       => $pegawai['nip'],    // pakai nip karena itu primary key-nya
                    'nama'      => $pegawai['nama'],
                    'tim'       => $pegawai['tim'],
                    'logged_in' => true
                ]);
                return redirect()->to('/home'); // arahkan ke halaman home
            } else {
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
