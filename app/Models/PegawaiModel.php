<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = "employee";
    protected $primaryKey = "nip";
    protected $allowedFields = ["nip", "name", "team", "username", "hash_password"];
    protected $returnType = "array";
}
