<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function set_env_var($key, $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

// Vercel serverless read-only filesystem fix
set_env_var('VIEW_COMPILED_PATH', '/tmp');
set_env_var('APP_SERVICES_CACHE', '/tmp/services.php');
set_env_var('APP_PACKAGES_CACHE', '/tmp/packages.php');
set_env_var('APP_CONFIG_CACHE', '/tmp/config.php');
set_env_var('APP_ROUTES_CACHE', '/tmp/routes.php');
set_env_var('APP_EVENTS_CACHE', '/tmp/events.php');
set_env_var('CACHE_STORE', 'array');
set_env_var('SESSION_DRIVER', 'cookie');
set_env_var('QUEUE_CONNECTION', 'sync');
set_env_var('LOG_CHANNEL', 'stderr');
set_env_var('APP_DEBUG', 'false');
set_env_var('APP_ENV', 'production');

// Inject APP_KEY if not set in Vercel
if (!getenv('APP_KEY')) {
    set_env_var('APP_KEY', 'base64:4kpMVVDdhmdqnhEvxxYK6+uf8sW0QXLqw+eBKwSM5jI=');
}

$needsMigration = false;
// Prevent DB Connection Error 500 by defaulting to SQLite in /tmp if local config is used
if (!getenv('DB_CONNECTION') || getenv('DB_HOST') === '127.0.0.1') {
    set_env_var('DB_CONNECTION', 'sqlite');
    $dbPath = '/tmp/database.sqlite';
    if (!file_exists($dbPath)) {
        touch($dbPath);
        $needsMigration = true;
    }
    set_env_var('DB_DATABASE', $dbPath);
}

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

if ($needsMigration) {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
    } catch (\Exception $e) {
        error_log("Migration failed: " . $e->getMessage());
    }
}

$app->handleRequest(\Illuminate\Http\Request::capture());
