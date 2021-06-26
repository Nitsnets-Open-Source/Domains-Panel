<?php declare(strict_types=1);

namespace App\Domains\Check\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Domains\Domain\Model\Domain as DomainModel;
use App\Domains\Check\Model\Builder\Check as Builder;
use App\Domains\Shared\Model\ModelAbstract;
use App\Domains\Subdomain\Model\Subdomain as SubdomainModel;

class Check extends ModelAbstract
{
    /**
     * @var string
     */
    protected $table = 'check';

    /**
     * @var string
     */
    public static string $foreign = 'check_id';

    /**
     * @var array
     */
    protected $casts = [
        'details' => 'array',
    ];

    /**
     * @param \Illuminate\Database\Query\Builder $q
     *
     * @return \App\Domains\Check\Model\Builder\Check
     */
    public function newEloquentBuilder($q)
    {
        return new Builder($q);
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

    /**
     * @return string
     */
    public function updateLink(): string
    {
        return route('domain.update.check', array_filter([
            $this->domain_id,
            'type' => $this->type,
            'subdomain_id' => $this->subdomain_id,
            'url_id' => $this->url_id,
        ]));
    }

    /**
     * @return string
     */
    public function valueLink(): string
    {
        return ((strpos($this->value, 'http') === 0) ? '' : 'https://').$this->value;
    }
}
