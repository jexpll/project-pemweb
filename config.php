<?php
session_start();
function env(string $key, string $default = ''): string
{
    static $v = null;
    if ($v === null) {
        $v = [];
        $f = __DIR__ . '/.env';
        if (is_file($f))
            foreach (file($f, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                if (str_starts_with(trim($line), '#') || !str_contains($line, '='))
                    continue;
                [$k, $x] = explode('=', trim($line), 2);
                $v[$k] = trim($x, " \"'");
            }
    }
    return $v[$key] ?? getenv($key) ?: $default;
}
$dbHost = env('MYSQL_ADDON_HOST', '127.0.0.1');
$dbPort = (int) env('MYSQL_ADDON_PORT', '3306');
$dbName = env('MYSQL_ADDON_DB', 'karsa');
$dbUser = env('MYSQL_ADDON_USER', 'root');
$dbPassword = env('MYSQL_ADDON_PASSWORD', '');
$dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $dbUser, $dbPassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]);
} catch (Throwable $e) {
    http_response_code(503);
    die('Database belum terhubung. Pastikan host, port, database, user, dan password di .env benar, lalu import schema.sql. Detail: ' . e($e->getMessage()));
}
function e($v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}
function user(): ?array
{
    return $_SESSION['user'] ?? null;
}
function require_login(): void
{
    if (!user()) {
        header('Location: login.php');
        exit;
    }
}
function require_admin(): void
{
    if (!user() || user()['role'] !== 'admin') {
        header('Location: ../web_user/login.php');
        exit;
    }
}
function go(string $url): never
{
    header('Location: ' . $url);
    exit;
}
?>