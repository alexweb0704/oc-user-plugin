<?php

namespace GeeksLab\User\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Users extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_geekslab_user_users'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('GeeksLab.User', 'geekslab-user-main-menu', 'geekslab-user-users');
    }
    
    /**
     * @var string Body CSS class to add to the layout.
     */
    public $bodyClass = 'compact-container';
}
