<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use Illuminate\Support\Collection;
use App\Domains\Domain\Model\Domain as Model;

class NotifyDomainExpiresSoon extends ActionAbstract
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected Collection $list;

    /**
     * @var string
     */
    protected string $expiresDate;

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->config();
        $this->list();
        $this->mail();
    }

    /**
     * @return void
     */
    protected function config(): void
    {
        $this->expiresDate = date('Y-m-d', strtotime('+'.app('configuration')->get('domain_notify_domain_expires_days').' days'));
    }

    /**
     * @return void
     */
    protected function list(): void
    {
        $this->list = Model::byDomainExpiresDate($this->expiresDate)->get();
    }

    /**
     * @return void
     */
    protected function mail(): void
    {
        if ($this->list->isNotEmpty()) {
            $this->factory()->mail()->domainExpiresSoon($this->list);
        }
    }
}
