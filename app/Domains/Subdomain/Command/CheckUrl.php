<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class CheckUrl extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check:url {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Subdomain Url by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkUrl();
    }
}
