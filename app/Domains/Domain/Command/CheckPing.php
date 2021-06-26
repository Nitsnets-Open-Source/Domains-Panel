<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckPing extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:ping {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Domain Ping by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkPing();
    }
}
