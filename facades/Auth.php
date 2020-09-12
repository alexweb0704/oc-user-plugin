<?php

namespace GeeksLab\User\Facades;

use October\Rain\Support\Facade;

class Auth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'geeks.auth';
    }
}
