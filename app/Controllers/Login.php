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
        $password = $this->request->getPost('hash_password');

        $employee = $model->where('username', $username)->first();

        if ($employee) {
            // Jika password cocok
            if ($password === $employee['hash_password']) {  // Verifikasi password (plaintext)

                // $_SESSION['nip'] = $employee['nip'];
                // $_SESSION['name'] = $employee['name'];
                // $_SESSION['team'] = $employee['team'];
                // $_SESSION['logged_in'] = true;
                $session->set([
                    'nip'       => $employee['nip'],
                    'name'      => $employee['name'],
                    'team'       => $employee['team'],
                    'logged_in' => true
                ]);
                // error_log(print_r($_SESSION, true));
                return redirect()->to('/voter');  // Redirect ke halaman home setelah login berhasil
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
