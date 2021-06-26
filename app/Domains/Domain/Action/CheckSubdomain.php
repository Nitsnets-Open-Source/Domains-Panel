<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class CheckSubdomain extends CheckAbstract
{
    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function handle(): Model
    {
        $this->check();
        $this->status();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        $subdomains = $this->subdomains();

        if (empty($this->row->subdomain_enabled) || $subdomains->isEmpty()) {
            $this->row->certificate_status = null;
            $this->row->ping_status = null;
            $this->row->url_status = null;

            return;
        }

        foreach ($subdomains as $each) {
            $this->factory('Subdomain', $each)->action()->check();
        }

        $this->row->certificate_status = $subdomains->firstWhere('certificate_status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->certificate_expires_at = $subdomains->pluck('certificate_expires_at')->filter()->sort()->first();
        $this->row->certificate_checked_at = $subdomains->pluck('certificate_checked_at')->filter()->sort()->first();

        $this->row->ping_status = $subdomains->firstWhere('ping_status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->ping_checked_at = $subdomains->pluck('ping_checked_at')->filter()->sort()->first();

        $this->row->url_status = $subdomains->firstWhere('url_status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->url_checked_at = $subdomains->pluck('url_checked_at')->filter()->sort()->first();
    }
}
