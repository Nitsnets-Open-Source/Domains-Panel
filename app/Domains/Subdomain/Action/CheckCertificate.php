<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class CheckCertificate extends CheckAbstract
{
    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
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
        if (empty($this->row->certificate_enabled)) {
            $this->row->certificate_status = null;
            return;
        }

        $check = $this->create('certificate', $this->row->host);

        $this->factory('Check', $check)->action()->certificate();

        $this->row->certificate_status = $check->status;
        $this->row->certificate_expires_at = $check->details['expires_at'] ?? null;
        $this->row->certificate_checked_at = $check->created_at;
    }
}
