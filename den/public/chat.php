<?php
require dirname(__DIR__).'/vendor/autoload.php';
use App\Components\Chat;
use Ratchet\Server\IoServer;

$server=IoServer::factory(
    new Chat(),
    port: 8181
);
$server->run();
