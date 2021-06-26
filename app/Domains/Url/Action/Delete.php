<?php declare(strict_types=1);

namespace App\Domains\Url\Action;

class Delete extends ActionAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->save();
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        $this->row->delete();
    }
}
