<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckDomain extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:domain {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Domain Domain by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkDomain();
    }
}
