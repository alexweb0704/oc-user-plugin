<?php

namespace GeeksLab\User\Middlewares;

use GeeksLab\User\Providers\GAuth;
use Illuminate\Http\Response;

abstract class BaseMiddleware
{
    /**
     * \GAuth
     *
     * @var GeeksLab\User\Providers\GAuth
     */
    protected $auth;
    
    public function __construct(GAuth $auth)
    {
        $this->auth = $auth;
    }

    protected function setCookie()
    {
        $this->auth->setCookie();
    }
    protected function setHeader(Response $response)
    {
        $response->headers->set('Authorization', 'Bearer asd');
        return $response;
    }
}
