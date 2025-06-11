<?php
namespace App\Core;

class View
{
    private static string $basePath = __DIR__ . '/../views/';

    public static function render(string $template, array $data = []): void
    {
        extract($data);
        include self::$basePath . $template . '.php';
    }
}
