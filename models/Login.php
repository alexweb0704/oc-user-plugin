<?php

namespace GeeksLab\User\Models;

use Model;

/**
 * Model
 *
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property string $type
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $activeted_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \October\Rain\Database\Collection|static[] all($columns = ['*'])
 * @method static \October\Rain\Database\Collection|static[] get($columns = ['*'])
 * @method static \October\Rain\Database\Builder|Login newModelQuery()
 * @method static \October\Rain\Database\Builder|Login newQuery()
 * @method static \October\Rain\Database\Builder|Login query()
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereActivetedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Login whereUserId($value)
 * @mixin \Eloquent
 */
class Login extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = [
        'created_at',
        'updated_at',
        'activeted_at',
        'deleted_at',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'geekslab_user_logins';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
