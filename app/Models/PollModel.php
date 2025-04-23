<?php

namespace App\Models;

use CodeIgniter\Model;

class PollModel extends Model
{
    protected $table = 'poll'; // Ganti sesuai nama tabel kamu

    protected $primaryKey = "id_poll";

    protected $allowedFields = ['id_poll', 'id_candidate', 'id_question', 'score'];
}
