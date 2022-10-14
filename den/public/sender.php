<?php
require dirname(__DIR__).'/vendor/autoload.php';



$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
  host: 'localhost',port: 5672
);
try {
    $canal=$connection->channel();
    $canal->queue_declare('Cofee',false,false,false);
    $message= new \PhpAmqpLib\Message\AMQPMessage(new \App\Components\CoffeMessage('latte',1));
    $canal->basic_publish($message,'','cofee');
    $canal->close();
    $connection->close();
}catch (\PhpAmqpLib\Exception\AMQPProtocolChannelException | AMQPException $exception)
{
    echo $exception->getMessage();
}

