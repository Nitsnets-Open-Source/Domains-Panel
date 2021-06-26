<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class CheckPing extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check:ping {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Subdomain Ping by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkPing();
    }
}
