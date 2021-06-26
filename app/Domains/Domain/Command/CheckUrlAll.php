<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckUrlAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:url:all';

    /**
     * @var string
     */
    protected $description = 'Check All Domains Urls';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkUrlAll();
    }
}
