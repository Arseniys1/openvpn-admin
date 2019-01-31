<?php

namespace OVAdmin\Api\Facades;


use Illuminate\Support\Facades\Facade;

class SSH extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SSH';
    }

}