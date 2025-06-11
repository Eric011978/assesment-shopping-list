<?php
require_once __DIR__ . '/core/Env.php';

// Load environment variables from the .env file so the DB config is populated
App\Core\Env::load(__DIR__ . '/.env');

$config = require __DIR__ . '/config.php';
$db = new PDO($config['db_dsn'], $config['db_user'], $config['db_pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach (glob(__DIR__ . '/migrations/*.sql') as $file) {
    echo "Running migration $file\n";
    $sql = file_get_contents($file);
    $db->exec($sql);
}

echo "Migrations completed.\n";
