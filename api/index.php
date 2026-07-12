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
set_env_var('CACHE_STORE', 'array');
set_env_var('SESSION_DRIVER', 'cookie');
set_env_var('QUEUE_CONNECTION', 'sync');
set_env_var('LOG_CHANNEL', 'stderr');
set_env_var('APP_DEBUG', 'true');
set_env_var('APP_ENV', 'local');

// Inject APP_KEY if not set in Vercel
if (!getenv('APP_KEY')) {
    set_env_var('APP_KEY', 'base64:4kpMVVDdhmdqnhEvxxYK6+uf8sW0QXLqw+eBKwSM5jI=');
}

// Prevent DB Connection Error 500 by defaulting to SQLite in /tmp if local config is used
if (!getenv('DB_CONNECTION') || getenv('DB_HOST') === '127.0.0.1') {
    set_env_var('DB_CONNECTION', 'sqlite');
    // Create an empty sqlite file in /tmp so it doesn't crash if it tries to connect
    touch('/tmp/database.sqlite');
    set_env_var('DB_DATABASE', '/tmp/database.sqlite');
}

require __DIR__ . '/../public/index.php';
