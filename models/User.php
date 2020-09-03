<?php

namespace GeeksLab\User\Models;

use Model;
use October\Rain\Database\Traits;

/**
 * User Model
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property string|null $email
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string $password
 * @property string|null $activation_code
 * @property string|null $reset_password_code
 * @property \Illuminate\Support\Carbon|null $registered_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $activated_at
 * @property \Illuminate\Support\Carbon|null $logined_at
 * @property \Illuminate\Support\Carbon|null $last_seen_at
 * @property \Illuminate\Support\Carbon|null $banned_at
 * @method static \October\Rain\Database\Collection|static[] all($columns = ['*'])
 * @method static \October\Rain\Database\Collection|static[] get($columns = ['*'])
 * @method static \October\Rain\Database\Builder|User newModelQuery()
 * @method static \October\Rain\Database\Builder|User newQuery()
 * @method static \October\Rain\Database\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoginedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegisteredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResetPasswordCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    use Traits\Validation;
    use Traits\Purgeable;
    use Traits\SoftDelete;
    use Traits\Hashable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'geekslab_user_users';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'username',
        'email',
        'password'
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'username' => 'required_without:email|unique:geekslab_user_users,username|string|min:2',
        'email' => 'required_without:username|unique:geekslab_user_users,email|email|min:2',
        'password' => 'required:create|confirmed|between:4,255',
        'password_confirmation' => 'required:create|between:4,255',

    ];

    
    const CREATED_AT = 'registered_at';

    const DELETED_AT = 'banned_at';

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
    protected $hidden = ['password'];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'registered_at',
        'updated_at',
        'activated_at',
        'logined_at',
        'last_seen_at',
        'banned_at',
    ];
    
    /**
     * @var array List of attribute names which should not be saved to the database.
     */
    protected $purgeable = ['password_confirmation'];

    /**
     * @var array List of attribute names which should be hashed using the Bcrypt hashing algorithm.
     */
    protected $hashable = ['password'];


    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    
    public $belongsToMany = [
        'groups' =>  [Group::class, 'table' => 'geekslab_user_user_group'],
    ];

    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'avatar' => \System\Models\File::class,
    ];
}
