<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

class Update extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->host = $this->data['host'];

        $this->row->certificate_enabled = $this->data['certificate_enabled'];
        $this->row->ping_enabled = $this->data['ping_enabled'];
        $this->row->url_enabled = $this->data['url_enabled'];

        $this->row->enabled = $this->data['enabled'];

        $this->row->updated_at = date('Y-m-d H:i:s');
        $this->row->save();
    }
}
