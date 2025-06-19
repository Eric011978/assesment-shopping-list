<?php
namespace App\Models;

use PDO;

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function all(): array
    {
        return $this->db->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
    }
}
