<?php

namespace App\Controllers;

use App\Models\VotingModel;
use App\Models\PeriodeModel;

class RekapController extends BaseController
{
    public function index()
    {
        $tahun = $this->request->getGet('tahun');
        $bulan = $this->request->getGet('bulan');
        $event = $this->request->getGet('event');

        $periodeModel = new PeriodeModel();
        $votingModel = new VotingModel();

        $periode = $periodeModel->where([
            'tahun' => $tahun,
            'bulan' => $bulan,
            'event' => $event
        ])->first();

        $hari_ini = date('Y-m-d');
        $status = 'berlangsung'; //tinggal ubah periode votingnya masih berlangsung atau udah *selesai*
        $hasil = [];
        $voters = [];

        if ($periode && $hari_ini > $periode['tanggal_selesai']) {
            // Voting selesai
            $hasil = $votingModel->getRekapNilai($tahun, $bulan, $event);
            $status = 'selesai';
        } else {
            // Voting masih berlangsung
            $voters = $votingModel->getVoters($tahun, $bulan, $event);
        }

        return view('voter', [
            'status' => $status,
            'hasil' => $hasil,
            'voters' => $voters,
            'tahun' => $tahun,
            'bulan' => $bulan,
            'event' => $event
        ]);
    }
}
