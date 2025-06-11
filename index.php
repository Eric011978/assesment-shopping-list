<?php
use App\Core\Env;
use App\Core\Router;

spl_autoload_register(function ($class) {
    $prefixes = [
        'App\\Controllers\\' => __DIR__ . '/controllers/',
        'App\\Models\\'      => __DIR__ . '/models/',
        'App\\Core\\'        => __DIR__ . '/core/',
    ];

    foreach ($prefixes as $prefix => $base) {
        $len = strlen($prefix);
        if (strncmp($class, $prefix, $len) === 0) {
            $relative = substr($class, $len);
            $file = $base . str_replace('\\', '/', $relative) . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
            return;
        }
    }
});

Env::load(__DIR__ . '/.env');

$router = new Router();

require __DIR__ . '/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
$router->dispatch($uri, $method);

