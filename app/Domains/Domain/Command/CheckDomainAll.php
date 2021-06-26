<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckDomainAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:domain:all';

    /**
     * @var string
     */
    protected $description = 'Check All Domains Domains';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkDomainAll();
    }
}
