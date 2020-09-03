<?php

namespace GeeksLab\User;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'GeeksLab\User\Components\Account' => 'account'
        ];
    }

    public function registerSettings()
    {
        
        return [
                'settings' => [
                    'label'       => 'geekslab.user::lang.settings.label',
                    'description' => 'geekslab.user::lang.settings.description',
                    'category'    => 'geekslab.user::lang.settings.category',
                    'icon'        => 'icon-user-secret',
                    'class'       => \GeeksLab\User\Models\Settings::class,
                    'order'       => 301,
                    'keywords'    => 'user frontend users '
                ]
            ];
    }

    public function registerEvents()
    {
        return [
            'geekslab.user.registered' => 'регистрация нового пользователя'
        ];
    }
}
