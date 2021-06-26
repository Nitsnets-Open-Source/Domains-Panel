<?php declare(strict_types=1);

namespace App\Domains\User\Model;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Domains\Shared\Model\ModelAbstract;
use App\Domains\User\Model\Builder\User as Builder;

class User extends ModelAbstract implements Authenticatable
{
    use AuthenticatableTrait, SoftDeletes, HasFactory;

    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var string
     */
    public static string $foreign = 'user_id';

    /**
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * @param \Illuminate\Database\Query\Builder $q
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($q)
    {
        return new Builder($q);
    }
}
