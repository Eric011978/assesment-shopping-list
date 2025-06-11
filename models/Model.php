<?php
namespace App\Models;

use PDO;

class Model
{
    protected static ?PDO $connection = null;
    protected PDO $db;

    public function __construct()
    {
        if (self::$connection === null) {
            $config = require __DIR__ . '/../config.php';
            self::$connection = new PDO(
                $config['db_dsn'],
                $config['db_user'],
                $config['db_pass']
            );
        }
        $this->db = self::$connection;
    }
}
