<?php declare(strict_types=1);

namespace App\Domains\Url\Command;

class Check extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain-url:check {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Url by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->check();
    }
}
