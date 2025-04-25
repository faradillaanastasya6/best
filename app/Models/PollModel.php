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
        with mean_score as (
            SELECT c.nip, AVG(s.score) mean_category, qc.id_category
            FROM candidate c
            INNER JOIN employee e
            ON c.nip=e.nip
            INNER JOIN poll p
            ON p.id_candidate = c.id_candidate
            INNER JOIN score s
            ON s.id_poll = p.id_poll
            INNER JOIN question q
            ON q.id_question = s.id_question
            inner join question_category qc
            on qc.id_category = q.id_category
            where p.id_event=$idEvent
            group by nip, id_category
        ),
        final_score as (
            select ms.nip, sum(weight*mean_category) score
            from mean_score ms
            inner join question_category  qc
            on qc.id_category = ms.id_category
            group by nip
            order by score desc
        )
        select fs.*, e.name
        from final_score fs
        inner join employee e 
        on fs.nip = e.nip
        ";

        $data = $this->db->query($script)->getResultArray();
        // error_log(print_r($data, true));
        return $data;
    }

    public function has_voted($nip, $idEvent)
    {
        $script = "
            select *
            from poll
            where nip=$nip and id_event=$idEvent
        ";
        $data = $this->db->query($script)->getResultArray();
        return $data;
    }
}
