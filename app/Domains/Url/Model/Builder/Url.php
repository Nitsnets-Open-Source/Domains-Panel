<?php declare(strict_types=1);

namespace App\Domains\Url\Model\Builder;

use App\Domains\Shared\Model\Builder\BuilderAbstract;

class Url extends BuilderAbstract
{
    /**
     * @param string $url
     *
     * @return self
     */
    public function byUrl(string $url): self
    {
        return $this->where('url', $url);
    }

    /**
     * @param int $domain_id
     *
     * @return self
     */
    public function byDomainId(int $domain_id): self
    {
        return $this->where('domain_id', $domain_id);
    }

    /**
     * @return self
     */
    public function list(): self
    {
        return $this->with('subdomain')->orderBy('url', 'ASC');
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

        return $this;
    }
}
