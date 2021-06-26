<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class CheckAll extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check:all';

    /**
     * @var string
     */
    protected $description = 'Check all Domains';

    /**
     * @return void
     */
    public function handle()
    {
        $this->factory()->action()->checkAll();
    }
}
