<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckPingAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:ping:all';

    /**
     * @var string
     */
    protected $description = 'Check All Domains Pings';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkPingAll();
    }
}
