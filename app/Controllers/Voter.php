<?php

// app/Controllers/Voter.php
namespace App\Controllers;

class Voter extends BaseController
{
    public function index()
    {
        return view('voter');
    }
    public function vote($filter)
    {
        // Pisahkan filter menjadi tahun, bulan, dan event
        [$tahun, $bulan, $event] = explode('_', $filter);

        // Siapkan data kandidat secara manual (tanpa akses database)
        $kandidatData = [
            [
                'nama' => 'Kandidat A',
                'jabatan' => 'Manager',
            ],
            [
                'nama' => 'Kandidat B',
                'jabatan' => 'Supervisor',
            ],
            [
                'nama' => 'Kandidat C',
                'jabatan' => 'Staff',
            ]
        ];

        // Kirim data ke view
        return view('vote_carousel', [
            'kandidatData' => $kandidatData,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'event' => $event
        ]);
    }
}
