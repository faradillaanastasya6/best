<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table = 'question'; // Ganti sesuai nama tabel kamu

    protected $primaryKey = "id_question";

    protected $allowedFields = ['id_question', 'question'];
}
