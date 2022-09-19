<?php

namespace App\Services;

interface CachedInterface
{
    public  function  get();
    public  function  set(array $val);
    public  function  getVal(array $val);
}
