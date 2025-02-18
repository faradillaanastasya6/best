<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM pegawai");
        $queryVariabel = $db->query(sql: "SELECT p.nip, p.nama, np.variabel_id, np.nilai FROM nilai_pegawai np INNER JOIN pegawai p ON np.nip = p.nip");

        // SELECT p.nip, p.nama, p.username, p.tim FROM pegawai p

        // $queryVariabel = $db->query(sql: "SELECT nip, ckp, kipapp, kjk FROM nilai_pegawai PIVOT (MAX(nilai) FOR variabel_id IN (ckp, kipapp, kjk)) AS nilai");

        $result = $query->getResultArray();
        $resultVariabel = $queryVariabel->getResultArray();

        // looping untuk variabel ditambahkan indeks -> looping dan array di PHP

        $nilai_pegawai = [];
        foreach ($resultVariabel as $row) {
            $nip = $row["nip"];
            $nama = $row["nama"];
            $variabel_id = $row["variabel_id"];
            $nilai = $row["nilai"];

            if (!isset($nilai_pegawai[$nip])) {
                $nilai_pegawai[$nip] = [
                    "nip" => $nip,
                    "nama" => $nama,
                    "kjk" => null,
                    "kipapp" => null,
                    "ckp" => null
                ];
            }
            $nilai_pegawai[$nip][$variabel_id] = $nilai;
        }
        $nilai_pegawai = array_values(
            $nilai_pegawai
        );


        $data = [
            // "variabel" => [
            //     ["nip" => "123456789", "nama" => "Fara", "kjk" => 5, "ckp" => 98, "kipapp" => 90, "indeks" => 2.67],
            //     ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90, "indeks" => 2.78],
            //     ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90, "indeks" => 2.45],
            //     ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90, "indeks" => 2.98],
            //     ["nip" => "123456789", "nama" => "Faradilla Anastasya", "kjk" => 5, "ckp" => 98, "kipapp" => 90, "indeks" => 2.12]
            // ],
            "variabel" => $nilai_pegawai,
            // "pegawai" => [
            //     ["nip" => "123456789", "nama" => "Fara", "tim" => "IPDS", "username" => "faradilla.anastasya"],
            //     ["nip" => "123456789", "nama" => "Fara", "tim" => "IPDS", "username" => "faradilla.anastasya"],
            //     ["nip" => "123456789", "nama" => "Fara", "tim" => "IPDS", "username" => "faradilla.anastasya"],
            //     ["nip" => "123456789", "nama" => "Fara", "tim" => "IPDS", "username" => "faradilla.anastasya"],
            //     ["nip" => "123456789", "nama" => "Fara", "tim" => "IPDS", "username" => "faradilla.anastasya"]
            // ]
            "pegawai" => $result
        ];
        return view('index', $data);
    }
}
