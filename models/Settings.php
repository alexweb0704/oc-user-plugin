<?php

namespace GeeksLab\User\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array Implementations.
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string A unique code
     */
    public $settingsCode = 'geekslab_user_settings';

    /**
     * @var string Reference to field configuration
     */
    public $settingsFields = 'fields.yaml';


    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getLoginAttributesOptions()
    {
        return [
            'username' => 'geekslab.user::lang.settings.loginAttributes.options.username',
            'email' => 'geekslab.user::lang.settings.loginAttributes.options.email',
        ];
    }

    public function getRememberMeAttribute($value)
    {
        if (!$value) {
            return 'ask';
        }

        return $value;
    }
}
