<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckSubdomain extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:subdomain {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Domain Subdomain by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkSubdomain();
    }
}
