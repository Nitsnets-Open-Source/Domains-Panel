<?php declare(strict_types=1);

namespace App\Domains\Domain\Model\Builder;

use App\Domains\Shared\Model\Builder\BuilderAbstract;

class Domain extends BuilderAbstract
{
    /**
     * @param string $host
     *
     * @return self
     */
    public function byHost(string $host): self
    {
        return $this->where('host', $host);
    }

    /**
     * @return self
     */
    public function list(): self
    {
        return $this->orderByRaw('LEAST(COALESCE(`certificate_expires_at`, "9999"), COALESCE(`domain_expires_at`, "9999"))');
    }

    /**
     * @return self
     */
    public function whereDomainExpired(): self
    {
        return $this->whereNotNull('domain_expires_at')
            ->whereRaw('`domain_expires_at` <= NOW()')
            ->orderBy('domain_expires_at', 'ASC');
    }

    /**
     * @return self
     */
    public function whereDomainExpiresNext(): self
    {
        return $this->whereNotNull('domain_expires_at')
            ->whereRaw('`domain_expires_at` >= NOW()')
            ->orderBy('domain_expires_at', 'ASC');
    }

    /**
     * @param string $date
     *
     * @return self
     */
    public function byDomainExpiresDate(string $date): self
    {
        return $this->whereDate('domain_expires_at', $date);
    }

    /**
     * @param array $filters
     *
     * @return self
     */
    public function filter(array $filters): self
    {
        if ($filters['error'] ?? false) {
            $this->whereNotNull('status')->where('status', '!=', 'SUCCESS');
        }

        if (($filter = $filters['type'] ?? false) && in_array($filter, ['certificate', 'domain', 'ping', 'url'])) {
            $this->whereNotNull($filter.'_status')->where($filter.'_status', '!=', 'SUCCESS');
        }

        return $this;
    }
}
