<?php

namespace App\Models;

use CodeIgniter\Model;

class VotingModel extends Model
{
    protected $table = 'vote'; // Ganti sesuai nama tabel kamu
    protected $allowedFields = ['id_voter', 'id_kandidat', 'id_pertanyaan', 'nilai', 'tahun', 'bulan', 'event', 'created_at'];

    // Ambil daftar yang sudah voting (berdasarkan voter unik)
    public function getVoters($tahun, $bulan, $event)
    {
        return $this->select('voter.nama, MIN(vote.created_at) as waktu_vote')
            ->join('voter', 'voter.id = vote.id_voter')
            ->where('vote.tahun', $tahun)
            ->where('vote.bulan', $bulan)
            ->where('vote.event', $event)
            ->groupBy('vote.id_voter')
            ->findAll();
    }

    // Ambil rekap nilai (rata-rata per kandidat)
    public function getRekapNilai($tahun, $bulan, $event)
    {
        return $this->select('kandidat.nama, kandidat.jabatan, AVG(vote.nilai) as rata_rata')
            ->join('kandidat', 'kandidat.id = vote.id_kandidat')
            ->where('vote.tahun', $tahun)
            ->where('vote.bulan', $bulan)
            ->where('vote.event', $event)
            ->groupBy('vote.id_kandidat')
            ->findAll();
    }
}
