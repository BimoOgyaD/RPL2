<?php
namespace App\Models;

class Database {
    protected $pdo;
    public function __construct() {
        $env = $this->loadEnv();
        $host = $env['DB_HOST'] ?? '127.0.0.1';
        $db   = $env['DB_NAME'] ?? 'moohub_db';
        $user = $env['DB_USER'] ?? 'root';
        $pass = $env['DB_PASS'] ?? '';
        $charset = $env['DB_CHARSET'] ?? 'utf8mb4';
        $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new \PDO($dsn, $user, $pass, $options);
    }

    protected function loadEnv() {
        $path = __DIR__ . '/../../.env';
        $data = [];
        if (!file_exists($path)) return $data;
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === ';' || strpos($line, '=') === false) continue;
            [$k,$v] = explode('=', $line, 2);
            $data[trim($k)] = trim($v);
        }
        return $data;
    }

    public function pdo() {
        return $this->pdo;
    }
}
