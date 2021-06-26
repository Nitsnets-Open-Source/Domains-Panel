<?php declare(strict_types=1);

namespace App\Domains\Configuration\Model;

use App\Domains\Configuration\Model\Builder\Configuration as Builder;
use App\Domains\Shared\Model\ModelAbstract;

class Configuration extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'configuration';

    /**
     * @var string
     */
    public static string $foreign = 'configuration_id';

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
