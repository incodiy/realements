<?php

namespace Incodiy\Realements\Facades;

use Illuminate\Support\Facades\Facade;

class Realements extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'realements';
    }
}