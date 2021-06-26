<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class NotifyDomainExpiresToday extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:notify:domain:expires:today';

    /**
     * @var string
     */
    protected $description = 'Notify expires today domains';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->notifyDomainExpiresToday();
    }
}
