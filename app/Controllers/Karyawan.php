<?php

namespace App\Controllers;

class Karyawan extends BaseController
{
    public function tambah(): string
    {
        return view('form-edit-karyawan');
    }
}
