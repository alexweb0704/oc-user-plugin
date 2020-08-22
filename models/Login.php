<?php namespace Sasa\User\Models;

use Model;

/**
 * Model
 */
class Login extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'sasa_user_logins';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
