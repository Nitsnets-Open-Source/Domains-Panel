<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class CheckPing extends CheckAbstract
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
            $this->row->ping_status = null;
            return;
        }

        foreach ($subdomains as $each) {
            $this->factory('Subdomain', $each)->action()->checkPing();
        }

        $this->row->ping_status = $subdomains->firstWhere('ping_status', 'FAILED') ? 'FAILED' : 'SUCCESS';
        $this->row->ping_checked_at = $subdomains->pluck('ping_checked_at')->filter()->sort()->first();
    }
}
