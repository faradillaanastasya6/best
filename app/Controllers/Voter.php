<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\KandidatModel;
use App\Models\QuestionModel;
use App\Models\PollModel;

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
        // $this->db->select();
        // Ambil data kandidat berdasarkan eventId
        $kandidatModel = new KandidatModel(); // Asumsikan ada model Kandidat untuk mengambil data kandidat
        $questionModel = new QuestionModel();
        // $kandidatData = $kandidatModel->where('id_event', $eventId)->findAll(); // Mengambil kandidat berdasarkan eventId
        $kandidatData = $kandidatModel->getAllCandidatesByEvent($eventId);
        $questionsData = $questionModel->findAll();
        // Kirim ke view vote_carousel
        return view('vote_carousel', [
            'kandidatData' => $kandidatData,
            'questionsData' => $questionsData,
            'eventId' => $eventId,
        ]);
    }

    public function voteAction()
    {
        $session = session();
        $json_data = file_get_contents('php://input'); // Get the raw request body
        $payload = json_decode($json_data, true); // Decode to associative array

        $pollModel = new PollModel();

        $data = [];
        foreach ($payload as $row) {
            foreach ($row['nilai'] as $question) {
                $new_data = [
                    'nip' => $session->userdata['nip'],
                    'id_candidate' => $row['id_candidate'],
                    'id_question' => $question['id_question'],
                    'score' => $question['score']
                ];
                array_push($data, $new_data);
            }
        }
        $pollModel->insertBatch($data);
    }
}
