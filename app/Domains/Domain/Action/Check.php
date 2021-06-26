<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;

class Check extends CheckAbstract
{
    /**
     * @return \App\Domains\Domain\Model\Domain
     */
    public function handle(): Model
    {
        $this->check();
        $this->status();
        $this->save();

        return $this->row;
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        $this->checkDomain();
        $this->checkSubdomain();
    }

    /**
     * @return void
     */
    protected function checkDomain(): void
    {
        $this->factory()->action()->checkDomain();
    }

    /**
     * @return void
     */
    protected function checkSubdomain(): void
    {
        $this->factory()->action()->checkSubdomain();
    }
}
