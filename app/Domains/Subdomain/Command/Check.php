<?php declare(strict_types=1);

namespace App\Domains\Subdomain\Command;

class Check extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'subdomain:check {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Subdomain by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->check();
    }
}
