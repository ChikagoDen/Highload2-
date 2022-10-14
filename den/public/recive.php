<?php
require dirname(__DIR__).'/vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection(
    host: 'localhost',port: 5672
);

try {
    $canal=$connection->channel();
    $canal->queue_declare('Cofee',false,false,false);
    $message= new \PhpAmqpLib\Message\AMQPMessage('latte',1);
    $canal->basic_publish($message);

    $calbac = function ($msg){
        echo $msg->body;
    };
    $canal->basic_consume('coffe','',false,true,false,$calbac);
    while ($canal->is_open()){
        $canal->wait();
    }
}catch (\PhpAmqpLib\Exception\AMQPProtocolChannelException | AMQPException $exception)
{
    echo $exception->getMessage();
}
