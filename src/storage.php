<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$envPath = dirname(__DIR__);
if (file_exists($envPath . '/.env')) {
    Dotenv::createImmutable($envPath)->safeLoad();
}

// (?string $hostname = null, ?string $username = null, ?string $password = null, ?string $database = null, ?int $port = null, ?string $socket = null)
$host = $_ENV['HOST_NAME'] ?? getenv('HOST_NAME');
$user = $_ENV['HOST_USER'] ?? getenv('HOST_USER');
$password = $_ENV['HOST_PASSWORD'] ?? getenv('HOST_PASSWORD');
$db = $_ENV['HOST_DB'] ?? getenv('HOST_DB');
$connectionErrorMsg = "No se pudo conectar a la base de datos. Por favor revise las credenciales ingresadas.";

$connection = mysqli_connect($host, $user, $password, $db) or exit($connectionErrorMsg);