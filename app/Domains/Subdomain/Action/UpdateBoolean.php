<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class UpdateBoolean extends ActionAbstract
{
    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
     */
    public function handle(): Model
    {
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->{$this->data['column']} = !$this->row->{$this->data['column']};
        $this->row->save();
    }
}
