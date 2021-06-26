<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class Create extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->saveRow();
        $this->saveSubdomain();
    }

    /**
     * @return void
     */
    protected function saveRow(): void
    {
        $this->row = Model::create([
            'host' => $this->data['host'],

            'domain_enabled' => $this->data['enabled'],
            'subdomain_enabled' => $this->data['subdomain'],
            'enabled' => $this->data['enabled'],

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

            'user_id' => $this->auth->id,
        ]);
    }

    /**
     * @return void
     */
    protected function saveSubdomain(): void
    {
        if (empty($this->data['subdomain'])) {
            return;
        }

        $this->factory('Subdomain')->action([
            'certificate_enabled' => true,
            'ping_enabled' => true,
            'url_enabled' => true,
            'enabled' => true,
            'domain_id' => $this->row->id,
        ] + $this->data)->create();
    }
}
