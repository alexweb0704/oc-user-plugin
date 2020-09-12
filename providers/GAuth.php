<?php

namespace GeeksLab\User\Providers;

use Cookie;
use Request;
use Session;
use Str;

class GAuth
{
    private $guard = 'web';

    private $sessionKey = 'geeks_auth';
    
    public function __construct()
    {
    }

    public function user()
    {
        $token = $this->token();
    }
    

    public function token()
    {
        if ($this->guard == 'api') {
            $auth =  Request::header('Authorization');
            return Str::replaceFirst('Bearer ', '', $auth);
        }
        
        return Session::get($this->sessionKey, Cookie::get($this->sessionKey));
    }

    public function setCookie()
    {
        Cookie::queue(Cookie::forever($this->sessionKey, 'asasddasd'));
        //dump(Cookie::get(), $this->sessionKey);
        //Cookie::forget($this->sessionKey);
        Cookie::queue(Cookie::forget($this->sessionKey));
    }
}
