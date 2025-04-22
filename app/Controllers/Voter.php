<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\KandidatModel;

class Voter extends BaseController
{
    public function index()
    {
        // Ambil event pertama dari database
        $eventModel = new EventModel();
        $event = $eventModel->asArray()->first();
        return view('voter', ['event' => $event]);
    }

    public function vote($eventId)
    {
        // Ambil data kandidat berdasarkan eventId
        $kandidatModel = new KandidatModel(); // Asumsikan ada model Kandidat untuk mengambil data kandidat
        $kandidatData = $kandidatModel->where('id_event', $eventId)->findAll(); // Mengambil kandidat berdasarkan eventId

        // Kirim ke view vote_carousel
        return view('vote_carousel', [
            'kandidatData' => $kandidatData,
            'eventId' => $eventId
        ]);
    }
}
