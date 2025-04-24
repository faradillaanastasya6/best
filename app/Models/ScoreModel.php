<?php

namespace App\Models;

use CodeIgniter\Model;

class ScoreModel extends Model
{
    protected $table = 'score'; // Ganti sesuai nama tabel kamu

    protected $primaryKey = "id_score";

    protected $allowedFields = ['id_score', 'id_poll', 'id_question', 'score'];
}
