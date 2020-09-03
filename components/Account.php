<?php

namespace GeeksLab\User\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use GeeksLab\User\Models;

class Account extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'geekslab.user::lang.components.account.name',
            'description' => 'geekslab.user::lang.components.account.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'redirect' => [
                'title'       => 'geekslab.user::lang.components.account.redirect.title',
                'description' => 'geekslab.user::lang.components.account.redirect.description',
                'type'        => 'dropdown',
                'default'     => ''
            ],
            'type' => [
                'title'       => 'geekslab.user::lang.components.account.types.title',
                'description' => 'geekslab.user::lang.components.account.types.description',
                'type'        => 'dropdown',
                'default'     => 'all',

            ],
            // 'paramCode' => [
            //     'title'       => /*Activation Code Param*/'rainlab.user::lang.account.code_param',
            //     'description' => /*The page URL parameter used for the registration activation code*/ 'rainlab.user::lang.account.code_param_desc',
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
        return [
            '' => 'geekslab.user::lang.components.account.redirect.options.refresh',
            '0' => 'geekslab.user::lang.components.account.redirect.options.no_redirect',
        ] + Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getTypeOptions()
    {
        $types = [
            'all' => 'geekslab.user::lang.components.account.types.options.all',
            'register' => 'geekslab.user::lang.components.account.types.options.register',
            'login' => 'geekslab.user::lang.components.account.types.options.login',
        ];
        return $types;
    }
    public function onRun()
    {
        $this->prepareVars();
    }

    public function prepareVars()
    {
        $this->page['formType'] = $this->property('type');
        $this->page['settings'] = $this->prepareSettings();
    }

    public function prepareSettings()
    {
        return [
            'loginAttributes' => Models\Settings::get('loginAttributes', ['login']),
            'loginFormPlaceholder' => Models\Settings::get('loginFormPlaceholder', 'Введите логин')
        ];
    }
}
