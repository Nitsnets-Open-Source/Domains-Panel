<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

class Update extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->host = $this->data['host'];

        $this->row->domain_enabled = $this->data['domain_enabled'];
        $this->row->domain_expires_at = helper()->dateToDate($this->data['domain_expires_at']) ?: null;
        $this->row->subdomain_enabled = $this->data['subdomain_enabled'];

        if ($this->data['subdomain_enabled'] === false) {
            $this->row->subdomain_status = null;
            $this->row->certificate_status = null;
            $this->row->ping_status = null;
            $this->row->url_status = null;
        }

        $this->row->enabled = $this->data['enabled'];

        $this->row->updated_at = date('Y-m-d H:i:s');
        $this->row->save();
    }
}
