<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Model\Builder;

use App\Domains\Shared\Model\Builder\BuilderAbstract;

class Subdomain extends BuilderAbstract
{
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
        return $this->with('domain')->orderByRaw('`certificate_expires_at` IS NULL, `certificate_expires_at`');
    }

    /**
     * @return self
     */
    public function whereCertificateExpired(): self
    {
        return $this->whereNotNull('certificate_expires_at')
            ->whereRaw('`certificate_expires_at` <= NOW()')
            ->orderBy('certificate_expires_at', 'ASC');
    }

    /**
     * @return self
     */
    public function whereCertificateExpiresNext(): self
    {
        return $this->whereNotNull('certificate_expires_at')
            ->whereRaw('`certificate_expires_at` >= NOW()')
            ->orderBy('certificate_expires_at', 'ASC');
    }

    /**
     * @param string $date
     *
     * @return self
     */
    public function byCertificateExpiresDate(string $date): self
    {
        return $this->whereDate('certificate_expires_at', $date);
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
