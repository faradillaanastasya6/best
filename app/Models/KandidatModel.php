<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table = 'candidate'; // Sesuaikan dengan nama tabel kandidat di database
    protected $primaryKey = 'id_candidate';
    protected $allowedFields = ['nip', 'id_event']; // Sesuaikan dengan kolom tabel kandidat

    public function getKandidatByEvent($eventId)
    {
        return $this->where('id_event', $eventId)->findAll();
    }

    public function getAllCandidatesByEvent($eventId)
    {
        $script = "
            SELECT c.*, e.name
            FROM candidate c
            INNER JOIN employee e
            ON e.nip = c.nip
            WHERE id_event=$eventId
        ";
        $data = $this->db->query($script)->getResultArray();
        return $data;
    }
}
