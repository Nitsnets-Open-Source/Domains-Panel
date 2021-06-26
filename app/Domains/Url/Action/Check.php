<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Model\Url as Model;
use App\Domains\Check\Model\Check as CheckModel;

class Check extends ActionAbstract
{
    /**
     * @return \App\Domains\Url\Model\Url
     */
    public function handle(): Model
    {
        $this->check();
        $this->save();

        return $this->row;
    }

    /**
     * @param string $type
     * @param string $value
     *
     * @return \App\Domains\Check\Model\Check
     */
    protected function create(string $type, string $value): CheckModel
    {
        return $this->factory('Check')->action([
            'type' => $type,
            'value' => $value,
            'domain_id' => $this->row->domain_id,
            'subdomain_id' => $this->row->subdomain_id,
            'url_id' => $this->row->id,
        ])->create();
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        $check = $this->create('url', $this->row->url);

        $this->factory('Check', $check)->action()->url();

        $this->row->status = $check->status;
        $this->row->time = $check->details['time'] ?? null;
        $this->row->code = $check->details['code'] ?? null;
        $this->row->checked_at = $check->created_at;
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
