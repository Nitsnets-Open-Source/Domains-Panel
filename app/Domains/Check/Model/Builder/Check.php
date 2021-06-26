<?php declare(strict_types=1);

namespace App\Domains\Check\Model\Builder;

use App\Domains\Check\Model\Check as Model;
use App\Domains\Shared\Model\Builder\BuilderAbstract;

class Check extends BuilderAbstract
{
    /**
     * @param \App\Domains\Check\Model\Check $row
     *
     * @return self
     */
    public function bySame(Model $row): self
    {
        return $this->where('domain_id', $row->domain_id)
            ->where('subdomain_id', $row->subdomain_id)
            ->where('url_id', $row->url_id)
            ->where('type', $row->type)
            ->where('value', $row->value);
    }

    /**
     * @param \App\Domains\Check\Model\Check $row
     * @param string $status
     *
     * @return self
     */
    public function whileStatus(Model $row, string $status): self
    {
        return $this->where('id', '>', (int)Model::bySame($row)->where('status', '!=', $status)->max('id'));
    }

    /**
     * @return self
     */
    public function list(): self
    {
        return $this->orderBy('id', 'DESC');
    }

    /**
     * @return self
     */
    public function withRelations(): self
    {
        return $this->with(['domain', 'subdomain']);
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

        if ($filter = $filters['type'] ?? false) {
            $this->where('type', $filter);
        }

        if ($filter = intval($filters['domain_id'] ?? 0)) {
            $this->where('domain_id', $filter);
        }

        if ($filter = intval($filters['subdomain_id'] ?? 0)) {
            $this->where('subdomain_id', $filter);
        }

        if ($filter = intval($filters['url_id'] ?? 0)) {
            $this->where('url_id', $filter);
        }

        if ($filter = $filters['search'] ?? false) {
            $this->searchLike('value', $filter);
        }

        if ($filter = helper()->dateToDate($filters['start_at'] ?? '')) {
            $this->where('created_at', '>=', $filter);
        }

        if ($filter = helper()->dateToDate($filters['end_at'] ?? '')) {
            $this->where('created_at', '<=', $filter);
        }

        if (($filters['limit'] ?? false) === 0) {
            $this->limit(500);
        }

        if ($filter = abs(intval($filters['limit'] ?? 0))) {
            $this->limit($filter);
        }

        if (($filters['sort'] ?? false) === 'time') {
            $this->orderBy('details->time', 'DESC');
        } else {
            $this->orderBy('id', 'DESC');
        }

        return $this;
    }
}
