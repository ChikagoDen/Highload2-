<?php

namespace App\Components;

class CoffeMessage implements \Serializable
{
    public string $body;
    public function __construct(string $type, int $userId)
    {
        $this->body=json_encode(['type'=>$this->type,'userId'=>$this->userId]);
    }

    public function serialize()
    {
        return ['body'=>$this->body];
    }

    public function unserialize(string $data)
    {
        return json_decode($data);
    }
}
