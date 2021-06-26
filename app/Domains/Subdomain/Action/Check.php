<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Action;

use App\Domains\Subdomain\Model\Subdomain as Model;

class Check extends CheckAbstract
{
    /**
     * @return \App\Domains\Subdomain\Model\Subdomain
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
        $this->checkCertificate();
        $this->checkPing();
        $this->checkUrl();
    }

    /**
     * @return void
     */
    protected function checkCertificate(): void
    {
        $this->factory()->action()->checkCertificate();
    }

    /**
     * @return void
     */
    protected function checkPing(): void
    {
        $this->factory()->action()->checkPing();
    }

    /**
     * @return void
     */
    protected function checkUrl(): void
    {
        $this->factory()->action()->checkUrl();
    }
}
