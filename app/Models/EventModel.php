<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event';         // ganti kalau nama tabel kamu bukan 'events'
    protected $primaryKey = 'id_event';
    protected $allowedFields = ['name', 'start_date', 'end_date'];
}
