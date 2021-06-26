<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use Illuminate\Support\Collection;
use App\Domains\Check\Model\Check as CheckModel;

abstract class CheckAbstract extends ActionAbstract
{
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
            'subdomain_id' => $this->row->id,
        ])->create();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function urls(): Collection
    {
        if ($this->row->relationLoaded('urls') === false) {
            $this->row->setRelation('urls', $this->row->urls()->enabled()->get());
        }

        return $this->row->urls;
    }

    /**
     * @return void
     */
    protected function status(): void
    {
        $success = in_array($this->row->certificate_status, [null, 'SUCCESS'], true)
            && in_array($this->row->ping_status, [null, 'SUCCESS'], true)
            && in_array($this->row->url_status, [null, 'SUCCESS'], true);

        $this->row->status = $success ? 'SUCCESS' : 'FAILED';
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->save();
    }
}
