<?php
require '../vendor/autoload.php';

$server=\Ratchet\Server\IoServer::factory(
    new \App\Components\Chat(),
    port: 8181
);
$server->run();
