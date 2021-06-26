<?php declare(strict_types=1);

namespace App\Domains\Url\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domains\Check\Model\Check as CheckModel;
use App\Domains\Domain\Model\Domain as DomainModel;
use App\Domains\Shared\Model\ModelAbstract;
use App\Domains\Subdomain\Model\Subdomain as SubdomainModel;
use App\Domains\Url\Model\Builder\Url as Builder;

class Url extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'url';

    /**
     * @var string
     */
    public static string $foreign = 'url_id';

    /**
     * @param \Illuminate\Database\Query\Builder $q
     *
     * @return \App\Domains\Url\Model\Builder\Url
     */
    public function newEloquentBuilder($q)
    {
        return new Builder($q);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checks(): HasMany
    {
        return $this->hasMany(CheckModel::class, static::$foreign);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(DomainModel::class, DomainModel::$foreign);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subdomain(): BelongsTo
    {
        return $this->belongsTo(SubdomainModel::class, SubdomainModel::$foreign);
    }
}
