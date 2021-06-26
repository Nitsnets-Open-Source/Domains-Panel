<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

use App\Domains\Url\Model\Url as Model;

class UpdateBoolean extends ActionAbstract
{
    /**
     * @return \App\Domains\Url\Model\Url
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
