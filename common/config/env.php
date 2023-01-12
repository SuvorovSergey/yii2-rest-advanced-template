<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

if ($_ENV['YII_DEBUG']) {
    defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['YII_DEBUG']);
}

defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV']);
