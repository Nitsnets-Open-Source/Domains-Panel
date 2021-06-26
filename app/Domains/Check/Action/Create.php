<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use App\Domains\Check\Model\Check as Model;

class Create extends ActionAbstract
{
    /**
     * @return \App\Domains\Check\Model\Check
     */
    public function handle(): Model
    {
        $this->create();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function create(): void
    {
        $this->row = Model::create([
            'type' => $this->data['type'],
            'value' => $this->data['value'],

            'created_at' => date('Y-m-d H:i:s'),

            'domain_id' => $this->data['domain_id'],
            'subdomain_id' => $this->data['subdomain_id'],
            'url_id' => $this->data['url_id'],
        ]);
    }
}
