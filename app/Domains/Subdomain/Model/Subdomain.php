<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domains\Check\Model\Check as CheckModel;
use App\Domains\Domain\Model\Domain as DomainModel;
use App\Domains\Url\Model\Url as UrlModel;
use App\Domains\Subdomain\Model\Builder\Subdomain as Builder;
use App\Domains\User\Model\User as UserModel;
use App\Domains\Shared\Model\ModelAbstract;

class Subdomain extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'subdomain';

    /**
     * @var string
     */
    public static string $foreign = 'subdomain_id';

    /**
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * @param \Illuminate\Database\Query\Builder $q
     *
     * @return \App\Domains\Subdomain\Model\Builder\Subdomain
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function urls(): HasMany
    {
        return $this->hasMany(UrlModel::class, static::$foreign);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, UserModel::$foreign);
    }
}
