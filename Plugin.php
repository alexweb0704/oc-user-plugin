<?php

namespace GeeksLab\User;

use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;
use Config;
use App;
use Cms\Classes\CmsController;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'GeeksLab\User\Components\Account' => 'account',
            'GeeksLab\User\Components\Session' => 'session'

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

    public function register()
    {
        App::bind('geeks.auth', Providers\GAuth::class);

        CmsController::extend(function ($controller) {
            $controller->middleware(\GeeksLab\User\Middlewares\AuthMiddleware::class);
        });
        $alias = AliasLoader::getInstance();
        $alias->alias('GAuth', Facades\Auth::class);
    }
    public function boot()
    {
    }
}
