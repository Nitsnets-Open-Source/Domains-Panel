<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Action\Traits\CreateUpdate as CreateUpdateTrait;
use App\Domains\Url\Model\Url as Model;

class Create extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row = Model::create([
            'url' => $this->data['url'],

            'enabled' => $this->data['enabled'],

            'created_at' => date('Y-m-d H:i:s'),

            'domain_id' => $this->data['domain_id'],
            'subdomain_id' => $this->data['subdomain_id'],
            'user_id' => $this->auth->id,
        ]);
    }
}
