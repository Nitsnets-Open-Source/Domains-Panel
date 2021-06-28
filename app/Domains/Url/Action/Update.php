<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

class Update extends CreateUpdateAbstract
{
    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->url = $this->data['url'];
        $this->row->enabled = $this->data['enabled'];
        $this->row->updated_at = date('Y-m-d H:i:s');
        $this->row->save();
    }
}
