<?php
/**
 * DATABASE CONNECTION
 * Kompatibel dengan Railway, Shared Hosting, dan Local Development
 */

// Load .env file jika ada
$env = [];
if (file_exists(__DIR__ . '/.env')) {
    $env = parse_ini_file(__DIR__ . '/.env');
}

// Ambil database credentials dari berbagai sumber
// Priority: getenv() > $_ENV > .env file > default
$server = getenv('MYSQLHOST') ?: ($_ENV['MYSQLHOST'] ?? ($env['MYSQLHOST'] ?? 'localhost'));
$user = getenv('MYSQLUSER') ?: ($_ENV['MYSQLUSER'] ?? ($env['MYSQLUSER'] ?? 'root'));
$password = getenv('MYSQLPASSWORD') ?: ($_ENV['MYSQLPASSWORD'] ?? ($env['MYSQLPASSWORD'] ?? ''));
$database = getenv('MYSQLDATABASE') ?: ($_ENV['MYSQLDATABASE'] ?? ($env['MYSQLDATABASE'] ?? 'learngo'));
$port = (int)(getenv('MYSQLPORT') ?: ($_ENV['MYSQLPORT'] ?? ($env['MYSQLPORT'] ?? 3306)));

// Cek apakah MySQLi tersedia
if (!extension_loaded('mysqli')) {
    error_log("FATAL: MySQLi extension not loaded");
    die("Error: MySQLi extension not available");
}

// Connect
$koneksi = @mysqli_connect($server, $user, $password, $database, $port);

// Cek koneksi
if (!$koneksi) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Gagal terhubung ke database. " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($koneksi, "utf8mb4");

// Set timezone
$timezone = getenv('APP_TIMEZONE') ?: ($_ENV['APP_TIMEZONE'] ?? ($env['APP_TIMEZONE'] ?? 'Asia/Jakarta'));
if (!empty($timezone)) {
    date_default_timezone_set($timezone);
}
?>