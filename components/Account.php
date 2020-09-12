<?php

namespace GeeksLab\User\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use ValidationException;
use GeeksLab\User\Models;
use Input;

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
            'loginAttributes' => Models\Settings::get('loginAttributes', ['username']),
            'loginFormPlaceholder' => Models\Settings::get('loginFormPlaceholder', 'Введите логин')
        ];
    }

    public function onLogin()
    {
        $data = Input::all();

        $rules = [
            'login' => 'required',
            'password' => 'required',
        ];
        
        $validation = \Validator::make($data, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        $credentials = array_only($data, ['login', 'password']);
        $remember = array_get($data, 'rememberMe', false);
        \GAuth::authenticate($credentials, $remember);
        
        //\GAuth::login($user, true);
    }
}
