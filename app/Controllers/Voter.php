<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\KandidatModel;
use App\Models\QuestionModel;
use App\Models\PollModel;
use App\Models\ScoreModel;

class Voter extends BaseController
{

    public function index()
    {
        // Ambil event pertama dari database
        $eventModel = new EventModel();
        $pollModel = new PollModel();

        $event = $eventModel->asArray()->first();
        $employee = $pollModel->getEmployeeVoted($event['id_event']);
        return view('voter', [
            'event' => $event,
            'employee' => $employee
        ]);
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
        $scoreModel = new ScoreModel();

        $data = [];
        // echo $payload;
        // error_log(print_r($session->get('nip'), true));
        foreach ($payload as $row) {
            $new_data = [
                'nip' => $session->get('nip'),
                'id_candidate' => $row['id_candidate'],
                'id_event' => $row['id_event'],
            ];
            array_push($data, $new_data);
        }

        $pollModel->insertBatch($data);

        $data = [];
        foreach ($payload as $row) {
            $poll = $pollModel->where('id_candidate', $row['id_candidate'])->where('nip', $session->get('nip'))->findAll()[0];
            foreach ($row['nilai'] as $score) {
                $new_data = [
                    'id_poll' => $poll['id_poll'],
                    'id_question' => $score['id_question'],
                    'score' => $score['score']
                ];
                array_push($data, $new_data);
            }
        }
        $scoreModel->insertBatch($data);
    }
}
