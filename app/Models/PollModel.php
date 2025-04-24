<?php

namespace App\Models;

use CodeIgniter\Model;

class PollModel extends Model
{
    protected $table = 'poll'; // Ganti sesuai nama tabel kamu

    protected $primaryKey = "id_poll";

    protected $allowedFields = ['id_poll', 'nip', 'id_candidate', 'created_at', 'id_event'];

    public function getEmployeeVoted($idEvent)
    {
        $script = "
            SELECT distinct p.nip, p.created_at, e.name
            FROM poll p
            INNER JOIN employee e
            ON p.nip = e.nip
            WHERE id_event=$idEvent
        ";
        $data = $this->db->query($script)->getResultArray();
        return $data;
    }

    public function getCandidatesScore($idEvent)
    {
        $script = "
            SELECT p.id_poll, c.id_candidate, c.nip, e.name, s.id_question, s.score, q.category
            FROM candidate c
            INNER JOIN employee e
            ON c.nip=e.nip
            INNER JOIN poll p
            ON p.id_candidate = c.id_candidate
            INNER JOIN score s
            ON s.id_poll = p.id_poll
            INNER JOIN question q
            ON q.id_question = s.id_question
            WHERE p.id_event=$idEvent
        ";
        $scoreCategoryMapping = [
            "Berorientasi Pelayanan" => 0.145,
            "Akuntabel" => 0.15
        ];
        $data = $this->db->query($script)->getResultArray();
        // return $data;
    }
}
