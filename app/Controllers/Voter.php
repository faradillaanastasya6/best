<?php

namespace App\Controllers;

class Voter extends BaseController
{
    public function index(): string
    {
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $event = $this->request->getGet('event');

        return view('voter', [
            'tahun' => $tahun,
            'bulan' => $bulan,
            'event' => $event
        ]);
    }
}
