<?php
use Phly\Conduit\MiddlewarePipe;
use Phly\Http\Server;

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(__DIR__ . '/../');
require_once 'vendor/autoload.php';

Server::createServer(include 'app.php', $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES)->listen();
