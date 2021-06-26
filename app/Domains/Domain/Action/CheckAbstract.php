<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use Illuminate\Support\Collection;
use App\Domains\Check\Model\Check as CheckModel;

abstract class CheckAbstract extends ActionAbstract
{
    /**
     * @param string $type
     * @param string $value
     *
     * @return \App\Domains\Check\Model\Check
     */
    protected function create(string $type, string $value): CheckModel
    {
        return $this->factory('Check')->action([
            'type' => $type,
            'value' => $value,
            'domain_id' => $this->row->id,
        ])->create();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function subdomains(): Collection
    {
        if (empty($this->row->subdomain_enabled)) {
            $this->row->setRelation('subdomains', collect());
        } elseif ($this->row->relationLoaded('subdomains') === false) {
            $this->row->setRelation('subdomains', $this->row->subdomains()->enabled()->get());
        }

        return $this->row->subdomains;
    }

    /**
     * @return void
     */
    protected function status(): void
    {
        $this->statusSubdomain();
        $this->statusRow();
    }

    /**
     * @return void
     */
    protected function statusSubdomain(): void
    {
        $subdomains = $this->subdomains();

        if ($subdomains->isEmpty()) {
            $this->row->subdomain_status = null;
        } else {
            $this->row->subdomain_status = $subdomains->firstWhere('status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        }
    }

    /**
     * @return void
     */
    protected function statusRow(): void
    {
        $success = in_array($this->row->domain_status, [null, 'SUCCESS'], true)
            && in_array($this->row->subdomain_status, [null, 'SUCCESS'], true);

        $this->row->status = $success ? 'SUCCESS' : 'FAILED';
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
