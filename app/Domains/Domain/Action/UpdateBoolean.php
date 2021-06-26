<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class UpdateBoolean extends ActionAbstract
{
    /**
     * @return \App\Domains\Domain\Model\Domain
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
