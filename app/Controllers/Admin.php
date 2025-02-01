<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            "karyawan" => [
                ["nip" => "123456789", "nama" => "Faradilla", "kjk" => 5, "ckp" => 98, "kipapp" => 90],
                ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90],
                ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90],
                ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90],
                ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90]
            ]
        ];
        return view('index', $data);
    }
}
