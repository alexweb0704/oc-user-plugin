<?php

namespace GeeksLab\User\Models;

use Closure;
use Model;

/**
 * Model
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property bool $is_active
 * @property int|null $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \October\Rain\Database\Collection|static[] all($columns = ['*'])
 * @method static \October\Rain\Database\Collection|static[] get($columns = ['*'])
 * @method static \October\Rain\Database\Builder|Group newModelQuery()
 * @method static \October\Rain\Database\Builder|Group newQuery()
 * @method static \October\Rain\Database\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Group extends Model
{
    use \October\Rain\Database\Traits\Validation;
              
    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];
    
    public $implement = [];

    public $translatable = [
        'name',
        'description'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'geekslab_user_groups';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'users' => [
            User::class,
            'table' => 'geekslab_user_user_group'
        ],
        'users_count' => [
            User::class,
            'table' => 'geekslab_user_user_group',
            'count' => true,
        ],
    ];
}
