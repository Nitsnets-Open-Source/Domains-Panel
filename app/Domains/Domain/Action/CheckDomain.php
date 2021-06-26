<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class CheckDomain extends CheckAbstract
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
        if (empty($this->row->domain_enabled)) {
            $this->row->domain_status = null;
            return;
        }

        $check = $this->create('domain', $this->row->host);

        $this->factory('Check', $check)->action()->domain();

        $this->row->domain_status = $check->status;
        $this->row->domain_expires_at = $check->details['expires_at'] ?? null;
        $this->row->domain_checked_at = $check->created_at;
    }
}
