<?php namespace Sasa\User\Models;

use Model;

/**
 * Model
 */
class User extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'sasa_user_users';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    public $belongsToMany = [
        'groups' =>  [Group::class, 'table' => 'sasa_user_user_group'],  
    ];

    public $hasMany = [
        'logins' => Login::class,
    ];
}
