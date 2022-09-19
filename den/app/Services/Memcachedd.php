<?php

namespace App\Services;

use Illuminate\Database\Connection;
use Memcached;
class Memcachedd implements MemcachedInterface
{

    public function get()
    {
        $connect =new Memcached();
        $connect->addServer('memcached',6379);
        return new Memcached();
    }

    public function set(array $val)
    {
        // TODO: Implement set() method.
    }

    public function getVal(array $val)
    {
        // TODO: Implement getVal() method.
    }
}
