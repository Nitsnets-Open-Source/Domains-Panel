<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class NotifyDomainExpiresSoon extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:notify:domain:expires:soon';

    /**
     * @var string
     */
    protected $description = 'Notify expires soon domains';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->notifyDomainExpiresSoon();
    }
}
