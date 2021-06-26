<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class CheckCertificate extends CheckAbstract
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

        if ($subdomains->isEmpty()) {
            $this->row->certificate_status = null;
            return;
        }

        foreach ($subdomains as $each) {
            $this->factory('Subdomain', $each)->action()->checkCertificate();
        }

        $this->row->certificate_status = $subdomains->firstWhere('certificate_status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->certificate_expires_at = $subdomains->pluck('certificate_expires_at')->filter()->sort()->first();
        $this->row->certificate_checked_at = $subdomains->pluck('certificate_checked_at')->filter()->sort()->first();
    }
}
