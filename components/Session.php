<?php

namespace GeeksLab\User\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use Exception;
use Redirect;

class Session extends ComponentBase
{
    
    public function componentDetails()
    {
        return [
        'name'        => 'geekslab.user::lang.components.session.name',
        'description' => 'geekslab.user::lang.components.session.description'
        ];
    }

    public function defineProperties()
    {
        return [
        'redirect' => [
            'title'       => 'geekslab.user::lang.components.session.redirect.title',
            'description' => 'geekslab.user::lang.components.session.redirect.description',
            'type'        => 'dropdown',
            'default'     => ''
        ],
        // 'paramCode' => [
        //     'title'       => /*Activation Code Param*/'rainlab.user::lang.session.code_param',
        //     'description' => /*The page URL parameter used for the registration activation code*/ 'rainlab.user::lang.session.code_param_desc',
        //     'type'        => 'string',
        //     'default'     => 'code'
        // ],
        // 'forceSecure' => [
        //     'title'       => /*Force secure protocol*/'rainlab.user::lang.account.force_secure',
        //     'description' => /*Always redirect the URL with the HTTPS schema.*/'rainlab.user::lang.account.force_secure_desc',
        //     'type'        => 'checkbox',
        //     'default'     => 0
        // ],
        // 'requirePassword' => [
        //     'title'       => /*Confirm password on update*/'rainlab.user::lang.account.update_requires_password',
        //     'description' => /*Require the current password of the user when changing their profile.*/'rainlab.user::lang.account.update_requires_password_comment',
        //     'type'        => 'checkbox',
        //     'default'     => 0
        // ],
        ];
    }

    public function getRedirectOptions()
    {
           return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function init()
    {
        if (empty($this->property('redirect'))) {
            throw new Exception('Не установлен параметр ');
        }
    }
    public function onRun()
    {
        //dump(\JWTAuth::parseToken());
    }

    public function onLogout()
    {
    }
}
