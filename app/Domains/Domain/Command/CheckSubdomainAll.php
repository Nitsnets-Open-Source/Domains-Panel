<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckSubdomainAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:subdomain:all';

    /**
     * @var string
     */
    protected $description = 'Check All Domains Subdomains';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkSubdomainAll();
    }
}
