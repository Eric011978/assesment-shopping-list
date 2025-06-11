<?php
$host = getenv('DB_HOST');
$name = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$charset = getenv('DB_CHARSET');

return [
    // MySQL connection details
    'db_host'    => $host,
    'db_name'    => $name,
    'db_user'    => $user,
    'db_pass'    => $pass,
    'db_charset' => $charset,
    'db_dsn'     => sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        $host,
        $name,
        $charset
    ),
];

