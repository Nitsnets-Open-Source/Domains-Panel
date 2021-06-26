<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class Create extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row = Model::create([
            'host' => $this->data['host'],

            'certificate_enabled' => $this->data['certificate_enabled'],
            'ping_enabled' => $this->data['ping_enabled'],
            'url_enabled' => $this->data['url_enabled'],
            'enabled' => $this->data['enabled'],

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

            'domain_id' => $this->data['domain_id'],
            'user_id' => $this->auth->id,
        ]);
    }
}
