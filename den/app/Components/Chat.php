<?php

namespace App\Components;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use SplObjectStorage;

class Chat implements MessageComponentInterface
{
    protected SplObjectStorage $client;
    public function __construct()
    {
        $this->client = new SplObjectStorage();
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->client->attach($conn);
        echo "new connect".$conn;
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->client->detach($conn);
        echo "close connect";
    }

    function onError(ConnectionInterface $conn, Exception $e)
    {
        echo "close connect".$e->getMessage();
    }

    public function onMessage(ConnectionInterface $conn, MessageInterface $msg)
    {
        $clientCount=$this->client->count();
        echo sprintf('Connect %d sending message "%s" to %d other connection %s',
        $conn,
        $msg,
        $clientCount,
            $clientCount ===1?'':'%s');
        foreach ($this->client as $cl)
        {
            if($conn !== $cl){
                $cl->send($msg);
            }
        }
    }
}
