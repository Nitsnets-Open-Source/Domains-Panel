<?php declare(strict_types=1);

namespace App\Domains\Domain\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Domains\Check\Model\Check as CheckModel;
use App\Domains\Domain\Model\Builder\Domain as Builder;
use App\Domains\Shared\Model\ModelAbstract;
use App\Domains\Subdomain\Model\Subdomain as SubdomainModel;
use App\Domains\Url\Model\Url as UrlModel;
use App\Domains\User\Model\User as UserModel;

class Domain extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'domain';

    /**
     * @var string
     */
    public static string $foreign = 'domain_id';

    /**
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    /**
     * @param \Illuminate\Database\Query\Builder $q
     *
     * @return \App\Domains\Domain\Model\Builder\Domain
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subdomains(): HasMany
    {
        return $this->hasMany(SubdomainModel::class, static::$foreign);
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
